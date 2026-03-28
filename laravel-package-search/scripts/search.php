#!/usr/bin/env php
<?php
/**
 * Laravel Package Search CLI v2
 *
 * Usage:
 *   php search.php <command> [args]
 *
 * Commands:
 *   search <scene> [limit]       Search packages by scene (auth, payment, excel...)
 *   compare <pkg1> <pkg2>       Compare two packages side by side
 *   compatible <ver>            Laravel version compatibility check
 *   alternatives <package>      Find alternatives to a package
 *   top [limit]                 Top N packages (default 10)
 *   recommend <requirement>     Natural language recommendation
 *   scenes                      List all available scenes
 */

$SCENES = [
    'auth'         => 'Authentication & Authorization',
    'payment'      => 'Payment & Orders',
    'multitenancy' => 'Multi-tenancy',
    'excel'        => 'Excel Import/Export',
    'media'        => 'Media & Files',
    'wechat'       => 'WeChat / SMS / Push',
    'queue'        => 'Queue & Jobs',
    'admin'        => 'Admin Panel',
    'search'       => 'Full-text Search',
    'logging'      => 'Logging & Audit',
    'api'          => 'API & SDK',
    'testing'      => 'Testing',
    'cache'        => 'Caching',
    'devtools'     => 'Developer Tools',
    'security'     => 'Security',
    'storage'      => 'Cloud Storage',
    'email'        => 'Email & Notifications',
];

$PACKAGES = [
    ['name' => 'spatie/laravel-permission',      'scene' => 'auth',        'score' => 95, 'stars' => 25000, 'downloads' => 15000000, 'updated' => '2026-01', 'laravel' => '10/11/12', 'use' => 'RBAC roles & permissions',                          'install' => 'composer require spatie/laravel-permission',                         'security' => true,  'cves' => 0],
    ['name' => 'laravel/scout',                 'scene' => 'search',      'score' => 92, 'stars' => 13000, 'downloads' => 8000000,  'updated' => '2026-02', 'laravel' => '10/11/12', 'use' => 'Full-text search (Algolia/MeiliSearch)',              'install' => 'composer require laravel/scout',                                       'security' => true,  'cves' => 0],
    ['name' => 'filament/filament',               'scene' => 'admin',       'score' => 96, 'stars' => 25000, 'downloads' => 1000000,  'updated' => '2026-03', 'laravel' => '10/11/12', 'use' => 'Modern admin panel (Livewire)',                    'install' => 'composer require filament/filament:"^3.0" -W && php artisan filament:install --panels', 'security' => true,  'cves' => 0],
    ['name' => 'maatwebsite/excel',              'scene' => 'excel',       'score' => 88, 'stars' => 13000, 'downloads' => 6000000,  'updated' => '2025-12', 'laravel' => '10/11',    'use' => 'Excel import/export',                              'install' => 'composer require maatwebsite/excel',                                 'security' => true,  'cves' => 0],
    ['name' => 'laravel/horizon',                'scene' => 'queue',      'score' => 95, 'stars' => 7000,  'downloads' => 3000000,   'updated' => '2026-03', 'laravel' => '10/11/12', 'use' => 'Redis queue monitoring',                          'install' => 'composer require laravel/horizon',                                    'security' => true,  'cves' => 0],
    ['name' => 'barryvdh/laravel-dompdf',       'scene' => 'payment',     'score' => 88, 'stars' => 12000, 'downloads' => 10000000, 'updated' => '2025-11', 'laravel' => '9/10/11',   'use' => 'PDF generation',                                  'install' => 'composer require barryvdh/laravel-dompdf',                            'security' => true,  'cves' => 0],
    ['name' => 'spatie/laravel-activitylog',      'scene' => 'logging',     'score' => 90, 'stars' => 10000, 'downloads' => 4000000,   'updated' => '2026-02', 'laravel' => '10/11/12', 'use' => 'Activity logging & audit trail',                   'install' => 'composer require spatie/laravel-activitylog',                        'security' => true,  'cves' => 0],
    ['name' => 'tymon/jwt-auth',                  'scene' => 'auth',        'score' => 88, 'stars' => 13000, 'downloads' => 4000000,   'updated' => '2025-09', 'laravel' => '9/10/11',   'use' => 'JWT token authentication',                       'install' => 'composer require tymon/jwt-auth',                                     'security' => false, 'cves' => 1, 'cvemeta' => 'CVE-2024-2022 (fixed)'],
    ['name' => 'laravel/telescope',              'scene' => 'devtools',    'score' => 94, 'stars' => 12000, 'downloads' => 2000000,   'updated' => '2026-01', 'laravel' => '10/11/12', 'use' => 'Debugging assistant',                             'install' => 'composer require laravel/telescope --dev && php artisan telescope:install', 'security' => true, 'cves' => 0],
    ['name' => 'overtrue/laravel-wechat',         'scene' => 'wechat',      'score' => 75, 'stars' => 8000,  'downloads' => 1000000,   'updated' => '2025-10', 'laravel' => '8/9/10',    'use' => 'WeChat SDK (mini/OA/pay)',                        'install' => 'composer require overtrue/laravel-wechat',                          'security' => false, 'cves' => 0],
    ['name' => 'stancl/tenancy',                 'scene' => 'multitenancy','score' => 94, 'stars' => 5000,  'downloads' => 500000,    'updated' => '2026-01', 'laravel' => '10/11/12', 'use' => 'Multi-tenant SaaS (per-tenant DB/Redis)',         'install' => 'composer require stancl/tenancy',                                    'security' => true,  'cves' => 0],
    ['name' => 'barryvdh/laravel-debugbar',       'scene' => 'devtools',    'score' => 88, 'stars' => 18000, 'downloads' => 5000000,   'updated' => '2025-10', 'laravel' => '9/10/11',   'use' => 'Debug toolbar',                                    'install' => 'composer require barryvdh/laravel-debugbar --dev',                  'security' => true,  'cves' => 0],
    ['name' => 'laravel/sanctum',                'scene' => 'auth',        'score' => 90, 'stars' => 8000,  'downloads' => 2000000,   'updated' => '2026-01', 'laravel' => '10/11/12', 'use' => 'SPA token authentication',                       'install' => 'composer require laravel/sanctum',                                   'security' => true,  'cves' => 0],
    ['name' => 'socialiteproviders/manager',        'scene' => 'auth',        'score' => 88, 'stars' => 10000, 'downloads' => 2000000,   'updated' => '2026-01', 'laravel' => '10/11/12', 'use' => '50+ social OAuth providers',                      'install' => 'composer require socialiteproviders/manager',                       'security' => true,  'cves' => 0],
    ['name' => 'predis/predis',                   'scene' => 'cache',       'score' => 85, 'stars' => 12000, 'downloads' => 20000000,  'updated' => '2025-08', 'laravel' => '10/11/12', 'use' => 'Redis client',                                   'install' => 'composer require predis/predis',                                      'security' => true,  'cves' => 0],
    ['name' => 'spatie/laravel-backup',            'scene' => 'logging',     'score' => 88, 'stars' => 12000, 'downloads' => 3000000,   'updated' => '2025-11', 'laravel' => '10/11',    'use' => 'Database backup to cloud',                        'install' => 'composer require spatie/laravel-backup',                            'security' => true,  'cves' => 0],
    ['name' => 'spatie/laravel-medialibrary',     'scene' => 'media',       'score' => 90, 'stars' => 10000, 'downloads' => 2000000,   'updated' => '2026-01', 'laravel' => '10/11/12', 'use' => 'Media management & image conversions',            'install' => 'composer require spatie/laravel-medialibrary',                      'security' => true,  'cves' => 0],
    ['name' => 'pestphp/pest',                    'scene' => 'testing',    'score' => 93, 'stars' => 11000, 'downloads' => 3000000,   'updated' => '2026-03', 'laravel' => '10/11/12', 'use' => 'Elegant testing (PHPUnit alternative)',            'install' => 'composer require pestphp/pest --dev && php artisan pest:install',      'security' => true,  'cves' => 0],
    ['name' => 'laravel/breeze',                  'scene' => 'auth',        'score' => 85, 'stars' => 10000, 'downloads' => 1000000,   'updated' => '2026-02', 'laravel' => '10/11/12', 'use' => 'Minimal auth starter kit',                       'install' => 'composer require laravel/breeze --dev && php artisan breeze:install', 'security' => true,  'cves' => 0],
    ['name' => 'barryvdh/laravel-snappy',         'scene' => 'payment',     'score' => 82, 'stars' => 4000,  'downloads' => 1000000,   'updated' => '2025-09', 'laravel' => '9/10/11',   'use' => 'PDF via wkhtmltopdf',                             'install' => 'composer require barryvdh/laravel-snappy',                           'security' => true,  'cves' => 0],
    ['name' => 'guzzlehttp/guzzle',               'scene' => 'api',         'score' => 92, 'stars' => 25000, 'downloads' => 100000000, 'updated' => '2025-07', 'laravel' => '10/11/12', 'use' => 'HTTP client (required by Laravel)',              'install' => 'composer require guzzlehttp/guzzle',                                  'security' => true,  'cves' => 0],
    ['name' => 'yansongda/pay',                   'scene' => 'payment',     'score' => 88, 'stars' => 6000,  'downloads' => 500000,    'updated' => '2026-02', 'laravel' => '8/9/10/11', 'use' => 'Alipay + WeChat Pay (CN)',                       'install' => 'composer require yansongda/pay',                                     'security' => true,  'cves' => 0],
    ['name' => 'laravel/fortify',                 'scene' => 'auth',        'score' => 86, 'stars' => 8000,  'downloads' => 2000000,   'updated' => '2026-01', 'laravel' => '10/11/12', 'use' => 'Headless authentication backend',                'install' => 'composer require laravel/fortify',                                    'security' => true,  'cves' => 0],
    ['name' => 'laravel/cashier',                 'scene' => 'payment',     'score' => 90, 'stars' => 9000,  'downloads' => 2000000,   'updated' => '2026-01', 'laravel' => '10/11/12', 'use' => 'Stripe/Braintree subscription billing',          'install' => 'composer require laravel/cashier',                                    'security' => true,  'cves' => 0],
];

// ── Helpers ──────────────────────────────────────────────────

function star_str(int $s): string {
    return $s >= 10000 ? round($s/1000).'k' : (string)$s;
}

function score_str(int $score): string {
    $n = (int)floor($score / 20);
    $s = str_repeat('*', $n) . ' ' . $score . '/100';
    return $s;
}

function dl_str(int $n): string {
    if ($n >= 1000000) return round($n/1000000, 1).'M';
    if ($n >= 1000) return round($n/1000, 1).'k';
    return (string)$n;
}

function print_pkg_row(int $rank, array $p): void {
    $line = sprintf("%2d. %-38s %-20s | dl:%-6s | %s",
        $rank, $p['name'], score_str($p['score']), dl_str($p['downloads']), $p['use']);
    echo $line . "\n";
    $cve = !($p['security'] ?? true);
    $cveStr = $cve ? "    [!] CVEs: {$p['cves']} - {$p['cvemeta']}" : '';
    echo "    laravel: {$p['laravel']} | updated: {$p['updated']}{$cveStr}\n";
    echo "    install: {$p['install']}\n\n";
}

// ── Commands ──────────────────────────────────────────────────

function cmd_search(string $scene, int $limit = 5): void {
    global $PACKAGES, $SCENES;
    $scene = strtolower($scene);

    if (!isset($SCENES[$scene])) {
        echo "Unknown scene: {$scene}\n";
        echo "Available: " . implode(', ', array_keys($SCENES)) . "\n";
        return;
    }

    $pkgs = array_filter($PACKAGES, fn($p) => $p['scene'] === $scene);
    usort($pkgs, fn($a, $b) => $b['score'] <=> $a['score']);
    $pkgs = array_slice($pkgs, 0, $limit);

    echo "\n=== Scene: {$SCENES[$scene]} ===\n\n";
    foreach ($pkgs as $i => $p) {
        print_pkg_row($i + 1, $p);
    }
}

function cmd_compare(string $n1, string $n2): void {
    global $PACKAGES;

    $p1 = null; $p2 = null;
    foreach ($PACKAGES as $p) {
        if ($p['name'] === $n1) $p1 = $p;
        if ($p['name'] === $n2) $p2 = $p;
    }

    if (!$p1 || !$p2) {
        echo "Package not found.\n";
        return;
    }

    echo "\n=== Compare: {$n1} vs {$n2} ===\n\n";

    $rows = [
        ['Score',      score_str($p1['score']), score_str($p2['score'])],
        ['Stars',      star_str($p1['stars']),   star_str($p2['stars'])],
        ['Downloads',  dl_str($p1['downloads']), dl_str($p2['downloads'])],
        ['Last Update',$p1['updated'],           $p2['updated']],
        ['Laravel',    $p1['laravel'],           $p2['laravel']],
        ['Use Case',   $p1['use'],              $p2['use']],
        ['Security',   ($p1['security'] ?? true) ? 'OK' : "CVE({$p1['cves']})",
                        ($p2['security'] ?? true) ? 'OK' : "CVE({$p2['cves']})"],
    ];

    foreach ($rows as [$c, $v1, $v2]) {
        printf("%-15s | %-30s | %-30s\n", $c, $v1, $v2);
    }
    echo "\n";
}

function cmd_compatible(string $ver): void {
    global $PACKAGES, $SCENES;

    $matched = array_filter($PACKAGES, fn($p) => in_array($ver, explode('/', $p['laravel'])));
    usort($matched, fn($a, $b) => $b['score'] <=> $a['score']);

    echo "\n=== Laravel {$ver} Compatible ({$ver}) ===\n";
    echo "Total: " . count($matched) . " packages\n\n";

    foreach ($matched as $i => $p) {
        print_pkg_row($i + 1, $p);
    }
}

function cmd_alternatives(string $pkgName): void {
    global $PACKAGES, $SCENES;

    $pkg = null;
    foreach ($PACKAGES as $p) {
        if ($p['name'] === $pkgName) { $pkg = $p; break; }
    }
    if (!$pkg) { echo "Package not found: {$pkgName}\n"; return; }

    $alts = array_filter($PACKAGES, fn($p) => $p['scene'] === $pkg['scene'] && $p['name'] !== $pkgName);
    usort($alts, fn($a, $b) => $b['score'] <=> $a['score']);

    echo "\n=== Alternatives to {$pkgName} ===\n";
    echo "Scene: {$SCENES[$pkg['scene']]} | {$pkg['use']}\n\n";

    foreach ($alts as $i => $alt) {
        $delta = $alt['score'] - $pkg['score'];
        $deltaStr = ($delta >= 0 ? "+{$delta}" : (string)$delta);
        print_pkg_row($i + 1, $alt);
        echo "    [delta vs original: {$deltaStr}]\n\n";
    }
}

function cmd_top(int $limit = 10): void {
    global $PACKAGES;

    $sorted = $PACKAGES;
    usort($sorted, fn($a, $b) => $b['score'] <=> $a['score']);
    $top = array_slice($sorted, 0, $limit);

    echo "\n=== Top " . count($top) . " Laravel Packages ===\n\n";
    foreach ($top as $i => $p) {
        $medal = $i === 0 ? '[GOLD]' : ($i === 1 ? '[SILVER]' : ($i === 2 ? '[BRONZE]' : '#'.($i+1)));
        print_pkg_row(str_replace('#', $medal, $i+1), $p);
    }
}

function cmd_recommend(string $req): void {
    global $PACKAGES, $SCENES;

    $req = strtolower($req);

    $map = [
        'permission'=> 'auth','rbac'=> 'auth','角色'=> 'auth','权限'=> 'auth','login'=> 'auth',
        'auth'=> 'auth','login'=> 'auth','登录'=> 'auth','认证'=> 'auth','jwt'=> 'auth',
        'wechat'=> 'wechat','weixin'=> 'wechat','微信'=> 'wechat',
        'pay'=> 'payment','payment'=> 'payment','支付'=> 'payment','alipay'=> 'payment','billing'=> 'payment',
        'excel'=> 'excel','csv'=> 'excel','导入'=> 'excel','export'=> 'excel','spreadsheet'=> 'excel',
        'search'=> 'search','搜索'=> 'search','全文'=> 'search','algolia'=> 'search',
        'admin'=> 'admin','后台'=> 'admin','panel'=> 'admin',
        'pdf'=> 'payment','发票'=> 'payment',
        'log'=> 'logging','日志'=> 'logging','audit'=> 'logging',
        'queue'=> 'queue','队列'=> 'queue','horizon'=> 'queue',
        'multi'=> 'multitenancy','tenant'=> 'multitenancy','多租户'=> 'multitenancy','saas'=> 'multitenancy',
        'media'=> 'media','file'=> 'media','图片'=> 'media','上传'=> 'media',
        'test'=> 'testing','测试'=> 'testing','pest'=> 'testing',
        'cache'=> 'cache','redis'=> 'cache',
        'api'=> 'api','http'=> 'api','guzzle'=> 'api',
        'debug'=> 'devtools','调试'=> 'devtools',
        'backup'=> 'logging',
        'social'=> 'auth','oauth'=> 'auth','facebook'=> 'auth','google'=> 'auth',
    ];

    $scene = null;
    foreach ($map as $kw => $s) {
        if (strpos($req, $kw) !== false) { $scene = $s; break; }
    }

    if (!$scene) {
        echo "\n=== Could not identify scene from: \"{$req}\" ===\n";
        echo "Try keywords: auth, payment, excel, wechat, search, admin, queue...\n";
        return;
    }

    $pkgs = array_filter($PACKAGES, fn($p) => $p['scene'] === $scene);
    usort($pkgs, fn($a, $b) => $b['score'] <=> $a['score']);
    $top = array_slice($pkgs, 0, 3);

    echo "\n=== Recommendation for: \"{$req}\" ===\n";
    echo "Scene: {$SCENES[$scene]}\n\n";

    $pick = $top[0] ?? null;
    if ($pick) {
        echo ">>> Best Match: {$pick['name']}\n";
        echo "    " . score_str($pick['score']) . "\n";
        echo "    Use: {$pick['use']}\n";
        echo "    Laravel: {$pick['laravel']}\n";
        echo "    Install: {$pick['install']}\n";
        if (!($pick['security'] ?? true)) {
            echo "    [!] CVEs: {$pick['cves']} - {$pick['cvemeta']}\n";
        }
        echo "\n";
    }

    if (count($top) > 1) {
        echo "Alternatives:\n";
        foreach (array_slice($top, 1) as $alt) {
            echo "  * {$alt['name']} -- " . score_str($alt['score']) . " -- {$alt['use']}\n";
        }
        echo "\n";
    }
}

function cmd_scenes(): void {
    global $PACKAGES, $SCENES;

    echo "\n=== Available Scenes ===\n\n";
    foreach ($SCENES as $code => $name) {
        $cnt = count(array_filter($PACKAGES, fn($p) => $p['scene'] === $code));
        echo "  {$code} -- {$name} ({$cnt} packages)\n";
    }
    echo "\n";
}

function cmd_help(): void {
    echo <<<'HELP'
Laravel Package Search CLI

Usage: php search.php <command> [args]

Commands:
  search <scene> [limit]       Search by scene (auth, payment, excel...)
  compare <pkg1> <pkg2>        Compare two packages
  compatible <laravel-ver>     Laravel version compatibility
  alternatives <package>        Find alternative packages
  top [limit]                  Top packages (default 10)
  recommend <requirement>       Natural language recommendation
  scenes                       List all scenes

Examples:
  php search.php search auth 3
  php search.php compare spatie/laravel-permission tymon/jwt-auth
  php search.php compatible 11
  php search.php alternatives barryvdh/laravel-dompdf
  php search.php recommend "I need WeChat Pay for Laravel 11"
  php search.php top 20
  php search.php scenes

HELP;
}

// ── Router ──────────────────────────────────────────────────

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
    case 'compatible':
        cmd_compatible($argv[2] ?? '11');
        break;
    case 'alternatives':
        if ($argc < 3) { echo "Usage: alternatives <package>\n"; exit(1); }
        cmd_alternatives($argv[2]);
        break;
    case 'top':
        cmd_top((int)($argv[2] ?? 10));
        break;
    case 'recommend':
        if ($argc < 3) { echo "Usage: recommend <requirement>\n"; exit(1); }
        cmd_recommend($argv[2]);
        break;
    case 'scenes':
        cmd_scenes();
        break;
    default:
        cmd_help();
}
