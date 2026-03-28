#!/usr/bin/env php
<?php

/**
 * Laravel Package Search CLI
 * Usage: php scripts/search.php <scene> [limit]
 *
 * Examples:
 *   php scripts/search.php auth
 *   php scripts/search.php payment 3
 *   php scripts/search.php search
 */

$SCENES = [
    'auth' => [
        'name' => 'Authentication & Authorization',
        'packages' => [
            ['name' => 'spatie/laravel-permission', 'score' => 95, 'use' => 'RBAC roles & permissions'],
            ['name' => 'tymon/jwt-auth', 'score' => 88, 'use' => 'JWT token auth'],
            ['name' => 'laravel/sanctum', 'score' => 90, 'use' => 'SPA token auth'],
            ['name' => 'laravel/fortify', 'score' => 86, 'use' => 'Headless auth backend'],
            ['name' => 'socialiteproviders/manager', 'score' => 88, 'use' => '50+ social OAuth'],
        ],
    ],
    'payment' => [
        'name' => 'Payment & Orders',
        'packages' => [
            ['name' => 'omnipay/omnipay', 'score' => 82, 'use' => 'Unified payment gateway'],
            ['name' => 'yansongda/pay', 'score' => 88, 'use' => 'Alipay + WeChat Pay'],
            ['name' => 'barryvdh/laravel-dompdf', 'score' => 88, 'use' => 'Invoice PDF generation'],
        ],
    ],
    'search' => [
        'name' => 'Full-text Search',
        'packages' => [
            ['name' => 'laravel/scout', 'score' => 92, 'use' => 'Algolia/MeiliSearch/Typesense'],
            ['name' => 'elastic/elasticsearch-laravel', 'score' => 88, 'use' => 'Elasticsearch official'],
            ['name' => 'meilisearch/meilisearch-php', 'score' => 85, 'use' => 'Fast open-source search'],
        ],
    ],
    'excel' => [
        'name' => 'Excel Import/Export',
        'packages' => [
            ['name' => 'maatwebsite/excel', 'score' => 88, 'use' => 'All-in-one Excel solution'],
            ['name' => 'phpoffice/phpspreadsheet', 'score' => 85, 'use' => 'Raw spreadsheet library'],
        ],
    ],
    'admin' => [
        'name' => 'Admin Panel',
        'packages' => [
            ['name' => 'filament/filament', 'score' => 96, 'use' => 'Modern Livewire admin'],
            ['name' => 'laravel-admin', 'score' => 85, 'use' => 'Traditional admin panel'],
        ],
    ],
    'queue' => [
        'name' => 'Queue & Job Scheduling',
        'packages' => [
            ['name' => 'laravel/horizon', 'score' => 95, 'use' => 'Redis queue monitoring'],
            ['name' => 'laravel/telescope', 'score' => 94, 'use' => 'Application debugging'],
        ],
    ],
    'wechat' => [
        'name' => 'WeChat / SMS / Push',
        'packages' => [
            ['name' => 'overtrue/laravel-wechat', 'score' => 75, 'use' => 'WeChat mini/OA/pay'],
            ['name' => 'laravel/twilio-notification-channel', 'score' => 85, 'use' => 'Twilio SMS/Push'],
        ],
    ],
    'multitenancy' => [
        'name' => 'Multi-tenancy',
        'packages' => [
            ['name' => 'stancl/tenancy', 'score' => 94, 'use' => 'Per-tenant DB/Redis'],
        ],
    ],
    'logging' => [
        'name' => 'Logging & Audit',
        'packages' => [
            ['name' => 'spatie/laravel-activitylog', 'score' => 90, 'use' => 'Activity logging'],
            ['name' => 'spatie/laravel-backup', 'score' => 88, 'use' => 'Database backup'],
        ],
    ],
];

if ($argc < 2) {
    echo "Usage: php search.php <scene> [limit]\n";
    echo "Available scenes: " . implode(', ', array_keys($SCENES)) . "\n";
    exit(1);
}

$scene = $argv[1];
$limit = isset($argv[2]) ? (int) $argv[2] : 3;

if (!isset($SCENES[$scene])) {
    echo "Unknown scene: $scene\n";
    echo "Available scenes: " . implode(', ', array_keys($SCENES)) . "\n";
    exit(1);
}

$data = $SCENES[$scene];
$packages = array_slice($data['packages'], 0, $limit);

echo "\n🎯 Scene: {$data['name']}\n";
echo str_repeat('-', 60) . "\n\n";

foreach ($packages as $i => $pkg) {
    $rank = $i + 1;
    $stars = str_repeat('⭐', (int) floor($pkg['score'] / 20));
    echo "{$rank}. {$pkg['name']}\n";
    echo "   Use: {$pkg['use']}\n";
    echo "   Score: {$stars} {$pkg['score']}/100\n";
    echo "   Install: composer require {$pkg['name']}\n\n";
}

echo "Tip: Install from https://packagist.org/packages/{$packages[0]['name']}\n\n";
