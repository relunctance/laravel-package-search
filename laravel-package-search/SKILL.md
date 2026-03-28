# Laravel Package Search - Skill Specification

## Overview

**Skill Name**: Laravel Package Search
**Type**: Development Assistant Skill
**Target**: Laravel developers seeking efficient plugin selection
**Engine**: OpenClaw Agent

---

## 1. Core Objectives

- Quickly search Laravel ecosystem packages (Packagist, GitHub, official recommendations)
- Automatically evaluate package quality and maintenance status
- Provide installation commands and configuration examples
- Support scene-based search (payment, auth, multi-tenancy, Excel, WeChat, etc.)
- Offer Top 20 Laravel package rankings
- Intelligently recommend the best-matched packages based on actual requirements

---

## 2. Scene Categories

### Supported Scenes

| Scene | Chinese | Description |
|-------|---------|-------------|
| `auth` | 认证/权限 | Authentication, authorization, roles, permissions |
| `payment` | 支付/订单 | Payment gateways, order management |
| `multitenancy` | 多租户 | Multi-tenant SaaS applications |
| `excel` | Excel/导入导出 | Spreadsheet import/export, data processing |
| `media` | 媒体/文件 | File uploads, media management, CDN |
| `wechat` | 微信/短信/推送 | WeChat SDK, SMS, push notifications |
| `queue` | 队列/任务 | Job queues, task scheduling, Laravel Horizon |
| `admin` | 后台管理 | Admin panels, Filament, Voyager |
| `search` | 搜索/全文检索 | Full-text search, Algolia, Scout |
| `logging` | 日志/审计 | Logging, audit trails, activity log |
| `api` | API/SDK | REST API, GraphQL, API documentation |
| `testing` | 测试 | Testing tools, Pest, PHPUnit |
| `cache` | 缓存 | Caching, Redis, cache management |
| `validation` | 验证 | Form validation, data validation rules |
| `migration` | 数据库迁移 | Database migrations, schema management |
| `ui` | 前端/UI | Frontend assets, Vue, React, Inertia |
| `email` | 邮件 | Email services, notifications, Mailgun |
| `storage` | 存储 | Cloud storage, S3, local disk |
| `security` | 安全 | Security headers, CSRF, XSS protection |
| `devtools` | 开发工具 | Debug, IDE integration, Laravel Debugbar |

---

## 3. Package Evaluation Criteria

Each package is evaluated on:

| Criterion | Weight | Description |
|----------|--------|-------------|
| GitHub Stars | 20% | Popularity indicator |
| Packagist Downloads | 20% | Real-world usage |
| Maintenance Activity | 25% | Last update, commit frequency |
| Documentation | 15% | Completeness and clarity |
| Laravel Compatibility | 10% | Version compatibility (10/11/12) |
| Security | 10% | Known vulnerabilities, audit status |

### Evaluation Formula

```
Score = (Stars/10000)*0.2 + (Downloads/100000)*0.2 + (ActivityScore)*0.25 + (DocScore)*0.15 + (CompatScore)*0.1 + (SecurityScore)*0.1
```

### Activity Score (0-100)

| Condition | Score |
|-----------|-------|
| Updated < 1 month ago | 100 |
| Updated < 3 months ago | 80 |
| Updated < 6 months ago | 60 |
| Updated < 1 year ago | 40 |
| Updated < 2 years ago | 20 |
| No updates > 2 years | 0 |

---

## 4. Top 20 Laravel Packages

See `references/top20-packages.md`

---

## 5. Smart Recommendation Logic

When a user describes their needs:

1. **Parse Intent** → Map to scene category
2. **Match Packages** → Find packages in that scene
3. **Filter** → Remove incompatible versions
4. **Sort** → By recommendation score
5. **Output** → Top 3 recommendations with reasoning

### Output Template

```
## 🎯 Recommended for: [User's Scenario]

**Top Pick**: [Package Name]
- **Why**: [Recommendation Reason]
- **Alternative**: [Alternative Package]
- **Caution**: [Any concerns]
- **Install**: `composer require [package]`
- **Compatibility**: Laravel X / Y / Z

---

**Alternative 1**: [Name] ...
**Alternative 2**: [Name] ...
```

---

## 6. Installation & Configuration

Each package entry includes:

```bash
composer require vendor/package
```

```php
// config/services.php or dedicated config file
'package' => [
    'key' => env('PACKAGE_KEY'),
],
```

```php
// app/Providers/AppServiceProvider.php
public function register(): void
{
    $this->mergeConfigFrom(...);
}
```

---

## 7. Version Compatibility

| Laravel | Compatible Packages |
|---------|-------------------|
| Laravel 12 | Packages updated after 2024-Q4 |
| Laravel 11 | Packages updated after 2023-Q2 |
| Laravel 10 | Packages updated after 2022-Q1 |

Always verify: `composer show vendor/package --tree | grep laravel/framework`

---

## 8. CLI Tool (scripts/search.php)

The skill includes a standalone CLI for agents or developers to query packages directly.

### Commands

```bash
php search.php <command> [args]
```

| Command | Args | Description |
|---------|------|-------------|
| `search` | `<scene> [limit]` | Search by scene category |
| `compare` | `<pkg1> <pkg2>` | Compare two packages side by side |
| `compatible` | `<laravel-version>` | Show packages compatible with Laravel X |
| `alternatives` | `<package>` | Find alternative packages in same scene |
| `top` | `[limit]` | Show Top N packages (default 10) |
| `recommend` | `<requirement>` | Natural language recommendation |
| `scenes` | — | List all 17 scene categories |

### Examples

```bash
# Search auth packages
php search.php search auth 3

# Compare two permission packages
php search.php compare spatie/laravel-permission tymon/jwt-auth

# Laravel 11 compatible packages only
php search.php compatible 11

# Find alternatives to a package
php search.php alternatives barryvdh/laravel-dompdf

# Natural language recommendation
php search.php recommend "I need WeChat Pay for Laravel 11"

# Top 20 packages
php search.php top 20

# All available scenes
php search.php scenes
```

### Integration with OpenClaw Agent

When the agent receives a package-related query, it invokes the corresponding CLI command and formats the output.

---

## 9. Usage Examples

### Example 1: Auth & Permissions

**User**: "I need role-based access control for Laravel 11"

**Response**: See `references/examples/auth-permission.md`

### Example 2: Payment Integration

**User**: "I want to add WeChat Pay to my Laravel app"

**Response**: See `references/examples/payment-wechat.md`

### Example 3: Full-Text Search

**User**: "Need search for my products"

**Response**: See `references/examples/search-fulltext.md`

---

## 9. Skill Usage in OpenClaw

### Activation Keywords

- "帮我找个 Laravel 插件"
- "Laravel package for XXX"
- "推荐 Laravel 认证插件"
- "Laravel auth package recommendation"
- "帮我评估这个包"
- "compare Laravel packages"

### Workflow

1. User describes requirement (Chinese or English)
2. Skill identifies scene category
3. Skill searches Top20 + scene database
4. Skill returns ranked recommendations
5. User selects → Skill provides install + config

---

## 10. Data Sources

- **Packagist API**: `https://packagist.org/api/search.json?q=`
- **GitHub API**: `https://api.github.com/repos/{vendor}/{package}`
- **GitHub Trending**: Community activity
- **Official Laravel Packages**: laravel.com/packages

---

## 11. File Structure

```
laravel-package-search/
├── SKILL.md                          # This file
├── references/
│   ├── top20-packages.md             # Top 20 package rankings
│   ├── scene-index.md                # Scene category index
│   └── examples/
│       ├── auth-permission.md
│       ├── payment-wechat.md
│       └── search-fulltext.md
└── scripts/
    └── search.php                    # Optional CLI search script
```

---

## 12. Publishing to Skills Market

```bash
clawhub login
clawhub publish laravel-package-search
```

Or submit to ClawHub website for review.

---

## 13. Maintenance

- Update Top 20 quarterly
- Add new scenes as Laravel ecosystem evolves
- Track deprecated packages and mark them
- Update compatibility for new Laravel releases
