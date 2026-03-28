# Laravel Package Search

**English** | [中文](README.zh-CN.md)

---

## Overview

**Laravel Package Search** is an OpenClaw Agent Skill that helps developers quickly find, evaluate, and recommend high quality Laravel ecosystem packages.

### Features

- 🔍 **Scene-Based Search** — Find packages by business scenario (auth, payment, multi-tenancy, Excel, WeChat, etc.)
- 🏆 **Top 20 Rankings** — Curated rankings by GitHub Stars, Packagist downloads, and maintenance activity
- 🤖 **Smart Recommendations** — AI-powered matching based on your actual requirements
- 📊 **Package Evaluation** — Automated scoring on GitHub Stars, docs, compatibility, and security
- 📦 **Installation & Config** — Direct composer commands and code examples ready to copy
- 🔄 **Laravel 10/11/12** — Automatic version compatibility checks

### Quick Start

```
You: "I need a Laravel permission package for Laravel 11"
Bot: [Automatically identifies scene: auth]
     [Searches Top20 + scene database]
     [Returns ranked recommendations with install commands]
```

---

## CLI Tool — 7 Commands

```bash
php search.php search auth 3              # Search by scene (auth/payment/excel/wechat...)
php search.php compare pkg1 pkg2         # Compare two packages side by side
php search.php compatible 11             # Laravel 11 compatible packages only
php search.php alternatives pkg           # Find alternatives in the same scene
php search.php top 20                    # Top 20 package rankings
php search.php recommend "your needs"    # Natural language recommendation
php search.php scenes                    # List all 17 scene categories
```

---

## Supported Scenes

| Code | Scene | Top Package |
|------|-------|------------|
| `auth` | Authentication & RBAC | spatie/laravel-permission |
| `payment` | Payment & Orders | yansongda/pay |
| `multitenancy` | Multi-tenancy SaaS | stancl/tenancy |
| `excel` | Excel Import/Export | maatwebsite/excel |
| `media` | Media & Files | spatie/laravel-medialibrary |
| `wechat` | WeChat / SMS / Push | overtrue/laravel-wechat |
| `queue` | Queue & Jobs | laravel/horizon |
| `admin` | Admin Panel | filament/filament |
| `search` | Full-text Search | laravel/scout |
| `logging` | Logging & Audit | spatie/laravel-activitylog |
| `api` | API & SDK | guzzlehttp/guzzle |
| `testing` | Testing | pestphp/pest |
| `cache` | Caching | predis/predis |
| `devtools` | Developer Tools | laravel/telescope |

---

## Top 20 Packages

| Rank | Package | Use Case | Score |
|------|---------|----------|-------|
| 1 | filament/filament | Admin Panel | 96/100 |
| 2 | spatie/laravel-permission | RBAC Permissions | 95/100 |
| 3 | laravel/horizon | Queue Monitoring | 95/100 |
| 4 | laravel/telescope | Debugging | 94/100 |
| 5 | stancl/tenancy | Multi-tenancy | 94/100 |
| 6 | pestphp/pest | Testing | 93/100 |
| 7 | laravel/scout | Full-text Search | 92/100 |
| 8 | guzzlehttp/guzzle | HTTP Client | 92/100 |
| 9 | spatie/laravel-activitylog | Activity Logging | 90/100 |
| 10 | spatie/laravel-medialibrary | Media Management | 90/100 |
| 11 | laravel/sanctum | SPA Token Auth | 90/100 |
| 12 | spatie/laravel-backup | Database Backup | 88/100 |
| 13 | barryvdh/laravel-dompdf | PDF Generation | 88/100 |
| 14 | maatwebsite/excel | Excel Import/Export | 88/100 |
| 15 | tymon/jwt-auth | JWT Auth | 88/100 |
| 16 | socialiteproviders/manager | Social OAuth (50+) | 88/100 |
| 17 | laravel/fortify | Headless Auth Backend | 86/100 |
| 18 | predis/predis | Redis Client | 85/100 |
| 19 | laravel/breeze | Minimal Auth Starter | 85/100 |
| 20 | barryvdh/laravel-snappy | PDF (wkhtmltopdf) | 82/100 |

See `references/top20-packages.md` for the complete list.

---

## Usage in OpenClaw

When activated, this skill will:

1. Parse your requirement (Chinese or English)
2. Map it to the closest scene category
3. Search the Top20 database and scene indexes
4. Return Top 3 recommended packages with:
   - Recommendation score
   - Install command
   - Configuration example
   - Compatibility notes
   - Alternatives

---

## Installation

This is an OpenClaw Agent Skill.

```bash
# Using ClawHub CLI
clawhub install laravel-package-search

# Or submit a request at https://clawhub.com
```

---

## File Structure

```
laravel-package-search/
├── SKILL.md                          # Skill specification
├── README.md                          # English version (this file)
├── README.zh-CN.md                    # Chinese version
├── references/
│   ├── top20-packages.md              # Full Top 20 rankings with details
│   ├── scene-index.md                 # Scene category index
│   └── examples/
│       ├── auth-permission.md         # Auth & RBAC (Chinese)
│       ├── payment-wechat.md          # Payment & WeChat (Chinese)
│       └── search-fulltext.md         # Full-text search (Chinese)
└── scripts/
    └── search.php                    # CLI tool (7 commands)
```

---

## Evaluation Criteria

Packages are scored 0-100 based on:

| Criterion | Weight | Source |
|-----------|--------|--------|
| GitHub Stars | 20% | GitHub API |
| Packagist Downloads | 20% | Packagist API |
| Maintenance Activity | 25% | Last commit date |
| Documentation | 15% | Manual review |
| Laravel Compatibility | 10% | composer.json |
| Security | 10% | Security advisories |

### Activity Score (0-100)

| Last Update | Score |
|-------------|-------|
| < 1 month ago | 100 |
| < 3 months ago | 80 |
| < 6 months ago | 60 |
| < 1 year ago | 40 |
| < 2 years ago | 20 |
| > 2 years ago | 0 |

---

## Contributing

Found a missing package or outdated info?
- Submit a PR at https://github.com/relunctance/laravel-package-search
- Or open an issue

---

## License

MIT License
