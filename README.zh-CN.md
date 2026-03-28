# Laravel Package Search / Laravel 插件搜索助手

**English** | **中文**

---

## 简介

**Laravel Package Search** 是一个 OpenClaw Agent Skill，帮助开发者快速检索、评估和推荐高质量的 Laravel 生态插件。

[![Packagist](https://img.shields.io/packagist/v/laravel/framework?style=flat-square)](https://packagist.org/packages/laravel/framework)
[![GitHub Stars](https://img.shields.io/github/stars/relunctance/laravel-package-search?style=flat-square)](https://github.com/relunctance/laravel-package-search)
[![ClawHub](https://img.shields.io/badge/ClawHub-laravel--package--search-6C43E5?style=flat-square)](https://clawhub.com/laravel-package-search)

---

## 核心功能

- 🔍 **实时 Packagist API** — 数据永不过期，每次查询实时拉取
- 🗄️ **本地缓存（1小时TTL）** — 重复查询飞快
- 🤖 **智能场景识别** — 按业务场景搜索（认证、支付、AI等）
- 📊 **质量评分** — stars × downloads × 活跃度 × 兼容性
- 📖 **Laravel 官方文档联动** — 自动链接官方文档（通过 [laravel-docs-reader](https://clawhub.com/laravel-docs-reader)）
- 📦 **安装命令** — `composer require` 直接复制使用

---

## 快速开始

```
你: "我需要一个 Laravel 11 的权限管理包"
麒麟: → 识别场景：auth
    → 实时 Packagist 搜索：laravel+auth
    → 返回排名推荐 + 安装命令 + Packagist 链接
```

---

## CLI 工具

```bash
php scripts/search.php search <场景> [数量]   # 按场景搜索（auth, payment, ai...）
php scripts/search.php compare <包1> <包2>  # 两个包横向对比
php scripts/search.php recommend <需求>    # 自然语言智能推荐
php scripts/search.php top [数量]           # Top N 排行榜（默认10）
php scripts/search.php scenes              # 列出全部 22 个场景
```

---

## 支持的场景（22个）

| 代码 | 场景 | Packagist 搜索 | 最佳插件 |
|------|------|---------------|----------|
| `auth` | 认证/权限 | [→](https://packagist.org/search?q=laravel+auth) | [spatie/laravel-permission](https://packagist.org/packages/spatie/laravel-permission) |
| `payment` | 支付/账单 | [→](https://packagist.org/search?q=laravel+payment) | [yansongda/pay](https://packagist.org/packages/yansongda/pay) |
| `search` | 全文检索 | [→](https://packagist.org/search?q=laravel+search+scout) | [laravel/scout](https://packagist.org/packages/laravel/scout) |
| `admin` | 后台管理 | [→](https://packagist.org/search?q=laravel+admin+filament) | [filament/filament](https://packagist.org/packages/filament/filament) |
| `queue` | 队列/任务 | [→](https://packagist.org/search?q=laravel+queue+horizon) | [laravel/horizon](https://packagist.org/packages/laravel/horizon) |
| `excel` | Excel 导入导出 | [→](https://packagist.org/search?q=laravel+excel) | [maatwebsite/excel](https://packagist.org/packages/maatwebsite/excel) |
| `media` | 媒体/文件管理 | [→](https://packagist.org/search?q=laravel+media) | [spatie/laravel-medialibrary](https://packagist.org/packages/spatie/laravel-medialibrary) |
| `wechat` | 微信/小程序 | [→](https://packagist.org/search?q=laravel+wechat) | [overtrue/laravel-wechat](https://packagist.org/packages/overtrue/laravel-wechat) |
| `multitenancy` | 多租户 SaaS | [→](https://packagist.org/search?q=laravel+multi-tenant) | [stancl/tenancy](https://packagist.org/packages/stancl/tenancy) |
| `ai` | AI / 大模型集成 | [→](https://packagist.org/search?q=laravel+openai+llm) | [openai-php/laravel](https://packagist.org/packages/openai-php/laravel) |
| `ratelimit` | 限流 | [→](https://packagist.org/search?q=laravel+rate+limit) | Laravel 内置 |
| `stripe` | Stripe 支付 | [→](https://packagist.org/search?q=laravel+stripe) | [laravel/cashier](https://packagist.org/packages/laravel/cashier) |
| `sms` | 短信通知 | [→](https://packagist.org/search?q=laravel+sms) | [laravel/twilio](https://packagist.org/packages/laravel/twilio-notification-channel) |
| `logging` | 日志/审计 | [→](https://packagist.org/search?q=laravel+log+activity) | [spatie/laravel-activitylog](https://packagist.org/packages/spatie/laravel-activitylog) |
| `api` | API 开发 | [→](https://packagist.org/search?q=laravel+api) | [laravel/sanctum](https://packagist.org/packages/laravel/sanctum) |
| `testing` | 测试 | [→](https://packagist.org/search?q=laravel+testing+pest) | [pestphp/pest](https://packagist.org/packages/pestphp/pest) |
| `cache` | 缓存 | [→](https://packagist.org/search?q=laravel+redis+cache) | [predis/predis](https://packagist.org/packages/predis/predis) |
| `email` | 邮件/通知 | [→](https://packagist.org/search?q=laravel+mail) | [laravel/mail](https://packagist.org/packages/laravel/mail) |
| `storage` | 云存储 | [→](https://packagist.org/search?q=laravel+storage+s3) | [league/flysystem-aws-s3-v3](https://packagist.org/packages/league/flysystem-aws-s3-v3) |
| `security` | 安全防护 | [→](https://packagist.org/search?q=laravel+security) | Laravel 内置 |
| `ui` | 前端 UI | [→](https://packagist.org/search?q=laravel+ui+vue) | [laravel/breeze](https://packagist.org/packages/laravel/breeze) |
| `devtools` | 开发工具 | [→](https://packagist.org/search?q=laravel+debug+telescope) | [laravel/telescope](https://packagist.org/packages/laravel/telescope) |

---

## Top 20 插件排行榜

| 排名 | 插件 | Packagist | Stars | 用途 | 评分 |
|------|------|-----------|-------|------|------|
| 1 | [filament/filament](https://packagist.org/packages/filament/filament) | [→](https://packagist.org/packages/filament/filament) | 25k | Admin 后台 | 96 |
| 2 | [spatie/laravel-permission](https://packagist.org/packages/spatie/laravel-permission) | [→](https://packagist.org/packages/spatie/laravel-permission) | 25k | RBAC 权限 | 95 |
| 3 | [laravel/horizon](https://packagist.org/packages/laravel/horizon) | [→](https://packagist.org/packages/laravel/horizon) | 7k | 队列监控 | 95 |
| 4 | [laravel/telescope](https://packagist.org/packages/laravel/telescope) | [→](https://packagist.org/packages/laravel/telescope) | 12k | 调试助手 | 94 |
| 5 | [stancl/tenancy](https://packagist.org/packages/stancl/tenancy) | [→](https://packagist.org/packages/stancl/tenancy) | 5k | 多租户 SaaS | 94 |
| 6 | [pestphp/pest](https://packagist.org/packages/pestphp/pest) | [→](https://packagist.org/packages/pestphp/pest) | 11k | 优雅测试 | 93 |
| 7 | [laravel/scout](https://packagist.org/packages/laravel/scout) | [→](https://packagist.org/packages/laravel/scout) | 13k | 全文搜索 | 92 |
| 8 | [guzzlehttp/guzzle](https://packagist.org/packages/guzzlehttp/guzzle) | [→](https://packagist.org/packages/guzzlehttp/guzzle) | 25k | HTTP 客户端 | 92 |
| 9 | [spatie/laravel-activitylog](https://packagist.org/packages/spatie/laravel-activitylog) | [→](https://packagist.org/packages/spatie/laravel-activitylog) | 10k | 操作日志 | 90 |
| 10 | [spatie/laravel-medialibrary](https://packagist.org/packages/spatie/laravel-medialibrary) | [→](https://packagist.org/packages/spatie/laravel-medialibrary) | 10k | 媒体管理 | 90 |
| 11 | [laravel/sanctum](https://packagist.org/packages/laravel/sanctum) | [→](https://packagist.org/packages/laravel/sanctum) | 8k | SPA Token 认证 | 90 |
| 12 | [spatie/laravel-backup](https://packagist.org/packages/spatie/laravel-backup) | [→](https://packagist.org/packages/spatie/laravel-backup) | 12k | 数据库备份 | 88 |
| 13 | [barryvdh/laravel-dompdf](https://packagist.org/packages/barryvdh/laravel-dompdf) | [→](https://packagist.org/packages/barryvdh/laravel-dompdf) | 12k | PDF 生成 | 88 |
| 14 | [maatwebsite/excel](https://packagist.org/packages/maatwebsite/excel) | [→](https://packagist.org/packages/maatwebsite/excel) | 13k | Excel 导入导出 | 88 |
| 15 | [tymon/jwt-auth](https://packagist.org/packages/tymon/jwt-auth) | [→](https://packagist.org/packages/tymon/jwt-auth) | 13k | JWT 认证 | 88 |
| 16 | [socialiteproviders/manager](https://packagist.org/packages/socialiteproviders/manager) | [→](https://packagist.org/packages/socialiteproviders/manager) | 10k | 50+ 平台 OAuth | 88 |
| 17 | [laravel/cashier](https://packagist.org/packages/laravel/cashier) | [→](https://packagist.org/packages/laravel/cashier) | 9k | Stripe 订阅支付 | 90 |
| 18 | [predis/predis](https://packagist.org/packages/predis/predis) | [→](https://packagist.org/packages/predis/predis) | 12k | Redis 客户端 | 85 |
| 19 | [laravel/breeze](https://packagist.org/packages/laravel/breeze) | [→](https://packagist.org/packages/laravel/breeze) | 10k | 认证脚手架 | 85 |
| 20 | [yansongda/pay](https://packagist.org/packages/yansongda/pay) | [→](https://packagist.org/packages/yansongda/pay) | 6k | 支付宝/微信支付 | 88 |

> 运行 `php scripts/search.php top 20` 获取**实时**排名（基于 Packagist 最新数据）

---

## 评分标准

插件实时评分 0-100：

| 标准 | 权重 | 数据来源 |
|------|------|---------|
| GitHub Stars | 15% | Packagist (github_stars) |
| Packagist 下载量 | 20% | Packagist API |
| 收藏数 | 10% | Packagist (favers) |
| 活跃度（≤30天=100） | 30% | 最近提交时间 |
| Laravel 兼容性 | 15% | composer.json |
| 描述完整度 | 10% | 非空描述 = 100 |

---

## 安装方式

```bash
# ClawHub CLI 安装
clawhub install laravel-package-search

# 或从 GitHub 下载
git clone https://github.com/relunctance/laravel-package-search.git
cd laravel-package-search

# 运行 CLI
php scripts/search.php scenes
php scripts/search.php search auth 3
php scripts/search.php recommend "我需要 Laravel 11 的微信支付"
```

---

## 文件结构

```
laravel-package-search/
├── SKILL.md                      # Skill 规范文档
├── README.md                     # 英文版
├── README.zh-CN.md             # 中文版
├── references/
│   ├── top20-packages.md        # 完整 Top 20 排行榜
│   └── scene-index.md           # 22 个场景索引（含 Packagist 链接）
└── scripts/
    └── search.php              # 实时 Packagist CLI
```

---

## laravel-docs-reader 联动

本 Skill 自动联动 [laravel-docs-reader](https://clawhub.com/laravel-docs-reader)，提供 Laravel 官方文档链接：

```
✅ spatie/laravel-permission → Authorization 官方文档
✅ laravel/scout → Database Search 官方文档
✅ laravel/horizon → Queues 官方文档
✅ laravel/sanctum → SPA Authentication 官方文档
✅ filament/filament → filamentphp.com/docs
...
```

---

## 参与贡献

发现遗漏的插件或过时信息？
- 🐛 [提交 Issue](https://github.com/relunctance/laravel-package-search/issues)
- 🔧 [提交 PR](https://github.com/relunctance/laravel-package-search/pulls)

---

## 许可证

MIT License | [GitHub](https://github.com/relunctance/laravel-package-search) | [ClawHub](https://clawhub.com/laravel-package-search)
