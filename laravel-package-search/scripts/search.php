#!/usr/bin/env php
<?php
/**
 * Laravel Package Search CLI v3
 *
 * Features:
 * - Real-time Packagist API (no static data)
 * - Local cache (1 hour TTL)
 * - Live GitHub stars/downloads via GitHub API
 * - Scene-based search with scoring
 * - Cross-reference to laravel-docs-reader
 *
 * Usage:
 *   php search.php <command> [args]
 */

define('CACHE_FILE', __DIR__ . '/.cache.json');
define('CACHE_TTL', 3600); // 1 hour

// ── Cache ──────────────────────────────────────────────────────────────────

function cache_get(string $key): ?array {
    $cache = cache_read();
    if (!isset($cache[$key])) return null;
    if ($cache[$key]['expires'] < time()) return null;
    return $cache[$key]['data'];
}

function cache_set(string $key, array $data): void {
    $cache = cache_read();
    $cache[$key] = ['data' => $data, 'expires' => time() + CACHE_TTL];
    cache_write($cache);
}

function cache_read(): array {
    if (!file_exists(CACHE_FILE)) return [];
    $json = file_get_contents(CACHE_FILE);
    return json_decode($json, true) ?: [];
}

function cache_write(array $cache): void {
    file_put_contents(CACHE_FILE, json_encode($cache, JSON_PRETTY_PRINT));
}

// ── Packagist API ──────────────────────────────────────────────────────────

function packagist_search(string $query, int $perPage = 20): array {
    $cacheKey = "packagist:{$query}:{$perPage}";
    $cached = cache_get($cacheKey);
    if ($cached !== null) return $cached;

    $url = "https://packagist.org/api/search.json?q=" . urlencode($query) . "&per_page={$perPage}&type=laravel";
    $ctx = stream_context_create(['http' => ['timeout' => 10, 'ignore_errors' => true]]);
    $json = @file_get_contents($url, false, $ctx);
    if (!$json) return [];

    $result = json_decode($json, true);
    $packages = $result['results'] ?? [];

    // Fetch detailed info for each package
    $detailed = [];
    foreach ($packages as $pkg) {
        $detail = packagist_package($pkg['name']);
        if ($detail) $detailed[] = $detail;
    }

    cache_set($cacheKey, $detailed);
    return $detailed;
}

function packagist_package(string $name): ?array {
    $cacheKey = "packagist_pkg:{$name}";
    $cached = cache_get($cacheKey);
    if ($cached !== null) return $cached;

    $url = "https://packagist.org/api/package/" . urlencode($name);
    $ctx = stream_context_create(['http' => ['timeout' => 10, 'ignore_errors' => true]]);
    $json = @file_get_contents($url, false, $ctx);
    if (!$json) return null;

    $result = json_decode($json, true);
    if (!$result || !isset($result['package'])) return null;

    $pkg = $result['package'];
    $versions = $pkg['versions'] ?? [];
    $latest = null;
    foreach ($versions as $v) {
        if (!$latest || version_compare($v['version_normalized'], $latest['version_normalized'], '>')) {
            $latest = $v;
        }
    }

    $data = [
        'name' => $pkg['name'],
        'description' => $pkg['description'] ?? '',
        'url' => $pkg['url'] ?? '',
        'stars' => $pkg['github_stars'] ?? 0,
        'downloads' => $pkg['downloads']['total'] ?? 0,
        'favers' => $pkg['favers'] ?? 0,
        'latest_version' => $latest['version'] ?? '',
        'latest_version_normalized' => $latest['version_normalized'] ?? '',
        'laravel' => extract_laravel_version($latest),
        'updated' => $pkg['time'] ?? '',
        'maintainers' => $pkg['maintainers'] ?? [],
    ];

    cache_set($cacheKey, $data);
    return $data;
}

function extract_laravel_version(array $version): string {
    $require = $version['require'] ?? [];
    foreach (['12', '11', '10', '9', '8'] as $v) {
        if (isset($require["laravel/framework"]) || isset($require["illuminate/contracts"])) {
            $constraint = $require["laravel/framework"] ?? $require["illuminate/contracts"] ?? '*';
            if (strpos($constraint, $v) !== false || $constraint === '*') {
                return $v . '+';
            }
        }
    }
    return 'unknown';
}

// ── GitHub API ──────────────────────────────────────────────────────────────

function github_repo(string $name): ?array {
    [$vendor, $repo] = explode('/', $name) + [1 => ''];
    $cacheKey = "github:{$vendor}/{$repo}";
    $cached = cache_get($cacheKey);
    if ($cached !== null) return $cached;

    $token = getenv('GITHUB_TOKEN') ?: '';
    $headers = ['Accept: application/vnd.github.v3+json'];
    if ($token) $headers[] = "Authorization: token {$token}";

    $ctx = stream_context_create([
        'http' => [
            'timeout' => 10,
            'ignore_errors' => true,
            'header' => implode("\r\n", $headers),
        ]
    ]);

    $url = "https://api.github.com/repos/{$vendor}/{$repo}";
    $json = @file_get_contents($url, false, $ctx);
    if (!$json) return null;

    $data = json_decode($json, true);
    if (!$data || isset($data['message'])) return null;

    $result = [
        'stars' => $data['stargazers_count'] ?? 0,
        'forks' => $data['forks_count'] ?? 0,
        'open_issues' => $data['open_issues_count'] ?? 0,
        'pushed_at' => $data['pushed_at'] ?? '',
        'updated_at' => $data['updated_at'] ?? '',
        'language' => $data['language'] ?? '',
    ];

    cache_set($cacheKey, $result);
    return $result;
}

// ── Scoring ─────────────────────────────────────────────────────────────────

function calc_score(array $pkg, ?array $github = null): int {
    $stars = $pkg['stars'] ?? 0;
    $dl = $pkg['downloads'] ?? 0;
    $favers = $pkg['favers'] ?? 0;
    $updated = strtotime($pkg['updated'] ?? '');
    $now = time();

    $starScore = min(100, ($stars / 500)) * 0.15;
    $dlScore = min(100, log10(max(1, $dl)) * 15) * 0.20;
    $favScore = min(100, ($favers / 200)) * 0.10;
    $actScore = calc_activity_score($updated, $now) * 0.30;
    $compatScore = ($pkg['laravel'] !== 'unknown') ? 100 * 0.15 : 0;
    $descScore = (strlen($pkg['description'] ?? '') > 20) ? 100 * 0.10 : 0;

    return (int)round($starScore + $dlScore + $favScore + $actScore + $compatScore + $descScore);
}

function calc_activity_score(int $updated, int $now): int {
    if (!$updated) return 0;
    $days = ($now - $updated) / 86400;
    if ($days < 30) return 100;
    if ($days < 90) return 80;
    if ($days < 180) return 60;
    if ($days < 365) return 40;
    if ($days < 730) return 20;
    return 0;
}

function score_stars(int $score): string {
    $n = (int)floor($score / 20);
    return str_repeat('★', $n) . ' ' . $score . '/100';
}

function dl_format(int $n): string {
    if ($n >= 1000000) return round($n / 1000000, 1) . 'M';
    if ($n >= 1000) return round($n / 1000, 1) . 'k';
    return (string)$n;
}

// ── Scene Mapping ───────────────────────────────────────────────────────────

function scene_packages(string $scene, int $limit = 5): array {
    $sceneQueries = [
        'auth' => 'laravel authentication rbac permission',
        'payment' => 'laravel payment stripe alipay wechat billing',
        'multitenancy' => 'laravel multi-tenant tenant saas',
        'excel' => 'laravel excel spreadsheet import export',
        'media' => 'laravel media file upload image',
        'wechat' => 'laravel wechat weixin wechat-sdk',
        'queue' => 'laravel queue job horizon',
        'admin' => 'laravel admin panel filament',
        'search' => 'laravel search scout full-text algolia',
        'logging' => 'laravel log activity audit',
        'api' => 'laravel api rest http guzzle sanctum',
        'testing' => 'laravel testing pest phpunit',
        'cache' => 'laravel redis cache',
        'validation' => 'laravel validation rule',
        'migration' => 'laravel migration database schema',
        'ui' => 'laravel ui vue react inertia',
        'email' => 'laravel mail notification email',
        'storage' => 'laravel storage s3 flysystem',
        'security' => 'laravel security csrf xss',
        'devtools' => 'laravel debug telescope debugbar',
        'ratelimit' => 'laravel rate-limit throttle',
        'ai' => 'laravel openai ai llm chatbot',
        'stripe' => 'laravel stripe payment subscription',
        'wechat-mini' => 'wechat mini-program',
        'sms' => 'laravel sms notification',
    ];

    $query = $sceneQueries[$scene] ?? "laravel {$scene}";
    $pkgs = packagist_search($query, 30);

    // Filter to Laravel packages and score
    $scored = [];
    foreach ($pkgs as $pkg) {
        if (($pkg['laravel'] ?? 'unknown') === 'unknown' && stripos($pkg['description'] ?? '', 'laravel') === false) continue;
        $score = calc_score($pkg);
        $pkg['score'] = $score;
        $pkg['scene'] = $scene;
        $scored[] = $pkg;
    }

    usort($scored, fn($a, $b) => $b['score'] <=> $a['score']);
    return array_slice($scored, 0, $limit);
}

// ── laravel-docs-reader 联动 ────────────────────────────────────────────────

function docs_cross_ref(string $package): string {
    // Map package to official Laravel docs sections
    $map = [
        'laravel/scout' => 'docs: https://laravel.com/docs/master/scout | section: Database Search',
        'laravel/horizon' => 'docs: https://laravel.com/docs/master/queues#laravel-horizon | section: Queues',
        'laravel/telescope' => 'docs: https://laravel.com/docs/master/telescope | section: Debugging',
        'laravel/sanctum' => 'docs: https://laravel.com/docs/master/sanctum | section: SPA Auth',
        'laravel/cashier' => 'docs: https://laravel.com/docs/master/billing | section: Billing',
        'laravel/fortify' => 'docs: https://laravel.com/docs/master/fortify | section: Authentication',
        'laravel/breeze' => 'docs: https://laravel.com/docs/master/starter-kits | section: Starter Kits',
        'filament/filament' => 'docs: https://filamentphp.com/docs | (community)',
        'spatie/laravel-permission' => 'docs: https://spatie.be/docs/laravel-permission | (community)',
        'maatwebsite/excel' => 'docs: https://docs.laravel-excel.com | (community)',
        'barryvdh/laravel-dompdf' => 'docs: https://github.com/barryvdh/laravel-dompdf | (community)',
        'pestphp/pest' => 'docs: https://pestphp.com/docs | (community)',
    ];

    foreach ($map as $pkg => $ref) {
        if (stripos($package, $pkg) !== false || stripos($pkg, $package) !== false) {
            return "\n📖 Laravel Docs: {$ref}";
        }
    }

    // Generic Laravel docs search
    return "\n📖 Laravel Docs: Run `laravel-docs-reader` to search official docs for this package";
}

// ── Output ───────────────────────────────────────────────────────────────────

function print_package(int $rank, array $pkg): void {
    $stars = $pkg['stars'] ?? 0;
    $dl = $pkg['downloads'] ?? 0;
    $score = $pkg['score'] ?? calc_score($pkg);
    $desc = $pkg['description'] ?? 'No description';
    $laravel = $pkg['laravel'] ?? 'unknown';
    $updated = $pkg['updated'] ?? '';

    $medal = $rank === 1 ? '🥇 ' : ($rank === 2 ? '🥈 ' : ($rank === 3 ? '🥉 ' : "#{$rank} ");

    echo "{$medal}{$pkg['name']}\n";
    echo "    " . score_stars($score) . " | ★{$stars} | ↓" . dl_format($dl) . " | Laravel {$laravel}\n";
    echo "    {$desc}\n";
    echo "    Install: composer require {$pkg['name']}\n";
    echo docs_cross_ref($pkg['name']) . "\n";
    if ($updated) {
        $date = date('Y-m', strtotime($updated));
        echo "    Updated: {$date}\n";
    }
    echo "\n";
}

function cmd_search(string $scene, int $limit = 5): void {
    $scenes = scene_list();
    $scene = strtolower($scene);
    if (!isset($scenes[$scene])) {
        echo "Unknown scene. Run `php search.php scenes` to see all.\n";
        return;
    }

    echo "\n=== 🔍 Scene: {$scenes[$scene]} ===\n";
    echo "Live Packagist data (cached 1h) | " . date('Y-m-d H:i') . "\n\n";

    $pkgs = scene_packages($scene, $limit);
    if (!$pkgs) {
        echo "No packages found. Try a broader query.\n";
        return;
    }

    foreach ($pkgs as $i => $pkg) {
        print_package($i + 1, $pkg);
    }
}

function cmd_compare(string $n1, string $n2): void {
    echo "\n=== ⚖️ Compare ===\n\n";

    foreach ([$n1, $n2] as $name) {
        $pkg = packagist_package($name);
        if (!$pkg) {
            echo "Not found: {$name}\n";
            continue;
        }
        $score = calc_score($pkg);
        echo "{$pkg['name']}\n";
        echo "  " . score_stars($score) . "\n";
        echo "  ★ {$pkg['stars']} | ↓ " . dl_format($pkg['downloads']) . " | favs: {$pkg['favers']}\n";
        echo "  Laravel: {$pkg['laravel']} | Latest: {$pkg['latest_version']}\n";
        echo "  {$pkg['description']}\n";
        echo docs_cross_ref($pkg['name']) . "\n\n";
    }
}

function cmd_recommend(string $req): void {
    echo "\n=== 🎯 Recommendation for: \"{$req}\" ===\n\n";

    $scene = detect_scene($req);
    if (!$scene) {
        echo "Could not identify a Laravel scene. Try: auth, payment, search, admin, queue...\n";
        return;
    }

    echo "Detected scene: {$scene}\n\n";
    $pkgs = scene_packages($scene, 3);

    $top = $pkgs[0] ?? null;
    if ($top) {
        echo "✅ Best Match: {$top['name']}\n";
        echo "   " . score_stars($top['score'] ?? 0) . "\n";
        echo "   {$top['description']}\n";
        echo "   Install: composer require {$top['name']}\n";
        echo docs_cross_ref($top['name']) . "\n\n";
    }

    if (count($pkgs) > 1) {
        echo "Alternatives:\n";
        foreach (array_slice($pkgs, 1) as $alt) {
            echo "  → {$alt['name']} (" . score_stars($alt['score'] ?? 0) . ") {$alt['description']}\n";
        }
        echo "\n";
    }
}

function detect_scene(string $req): ?string {
    $req = strtolower($req);
    $map = [
        'auth' => ['permission', 'rbac', '角色', '权限', 'login', '登录', '认证', 'jwt', 'oauth', 'social'],
        'payment' => ['pay', '支付', 'alipay', 'wechat pay', 'stripe', 'billing', '订阅', 'invoice', '发票'],
        'search' => ['search', '搜索', '全文', 'algolia', 'meilisearch', 'typesense'],
        'admin' => ['admin', '后台', 'panel', 'filament'],
        'queue' => ['queue', '队列', 'horizon', 'job'],
        'excel' => ['excel', 'csv', '导入', 'export', 'spreadsheet', 'sheet'],
        'wechat' => ['wechat', 'weixin', '微信', 'mini'],
        'media' => ['media', 'file', '图片', 'upload', 'image', 'cdn'],
        'multitenancy' => ['multi', 'tenant', '多租户', 'saas'],
        'ai' => ['ai', 'openai', 'llm', 'chatgpt', 'gpt', '人工智能', '大模型'],
        'ratelimit' => ['rate', 'limit', '限流', 'throttle', 'qps'],
        'stripe' => ['stripe'],
        'sms' => ['sms', '短信', 'twilio'],
    ];

    foreach ($map as $scene => $keywords) {
        foreach ($keywords as $kw) {
            if (strpos($req, $kw) !== false) return $scene;
        }
    }
    return null;
}

function cmd_top(int $limit = 10): void {
    echo "\n=== 🏆 Top {$limit} Laravel Packages ===\n";
    echo "Live Packagist data (cached 1h) | " . date('Y-m-d H:i') . "\n\n";

    $pkgs = packagist_search('laravel framework', 50);
    $scored = [];
    foreach ($pkgs as $pkg) {
        $pkg['score'] = calc_score($pkg);
        $scored[] = $pkg;
    }
    usort($scored, fn($a, $b) => $b['score'] <=> $a['score']);

    foreach (array_slice($scored, 0, $limit) as $i => $pkg) {
        print_package($i + 1, $pkg);
    }
}

function cmd_scenes(): void {
    echo "\n=== 📦 Available Scenes ===\n\n";
    foreach (scene_list() as $code => $name) {
        echo "  {$code}  {$name}\n";
    }
    echo "\n";
}

function scene_list(): array {
    return [
        'auth' => 'Authentication & Authorization',
        'payment' => 'Payment & Billing',
        'search' => 'Full-text Search',
        'admin' => 'Admin Panel',
        'queue' => 'Queue & Jobs',
        'excel' => 'Excel Import/Export',
        'media' => 'Media & Files',
        'wechat' => 'WeChat / Mini Program',
        'multitenancy' => 'Multi-tenancy / SaaS',
        'ai' => 'AI / LLM Integration',
        'ratelimit' => 'Rate Limiting',
        'stripe' => 'Stripe Payments',
        'sms' => 'SMS Notifications',
        'logging' => 'Logging & Audit',
        'api' => 'API / HTTP',
        'testing' => 'Testing',
        'cache' => 'Caching / Redis',
        'ui' => 'Frontend / UI',
        'email' => 'Email / Notifications',
        'storage' => 'Cloud Storage',
        'security' => 'Security',
        'devtools' => 'Developer Tools',
    ];
}

function cmd_help(): void {
    echo <<<'HELP'
Laravel Package Search CLI v3

Features:
  • Real-time Packagist API (data never stale)
  • Local cache with 1-hour TTL
  • Live GitHub stars + download counts
  • Laravel Docs cross-reference (laravel-docs-reader integration)
  • Smart scene detection

Commands:
  search <scene> [limit]       Search by scene (auth, payment, ai...)
  compare <pkg1> <pkg2>        Compare two packages
  recommend <requirement>       Natural language recommendation
  top [limit]                  Top packages (default 10)
  scenes                       List all scenes

Examples:
  php search.php search auth 3
  php search.php compare spatie/laravel-permission laravel/sanctum
  php search.php recommend "I need WeChat Pay for Laravel 11"
  php search.php recommend "I need AI chat for Laravel"
  php search.php search ai 3
  php search.php top 20

Notes:
  - Cache lives in scripts/.cache.json (auto-created)
  - GitHub token (optional): set GITHUB_TOKEN env var for higher rate limits
  - laravel-docs-reader integration: run that skill for official Laravel docs

HELP;
}

// ── Router ────────────────────────────────────────────────────────────────────

if ($argc < 2) { cmd_help(); exit; }

$cmd = $argv[1];
switch ($cmd) {
    case 'search':
        cmd_search($argv[2] ?? 'auth', (int)($argv[3] ?? 5));
        break;
    case 'compare':
        if ($argc < 4) { echo "Usage: compare <pkg1> <pkg2>\n"; exit(1); }
        cmd_compare($argv[2], $argv[3]);
        break;
    case 'recommend':
        if ($argc < 3) { echo "Usage: recommend <requirement>\n"; exit(1); }
        cmd_recommend($argv[2]);
        break;
    case 'top':
        cmd_top((int)($argv[2] ?? 10));
        break;
    case 'scenes':
        cmd_scenes();
        break;
    default:
        cmd_help();
}
