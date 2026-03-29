# Laravel Package Search

**English** | [中文](README.zh-CN.md) | [繁體中文](README.zh-TW.md) | [日本語](README.ja.md) | [한국어](README.ko.md) | [Français](README.fr.md) | [Español](README.es.md) | [Deutsch](README.de.md) | [Italiano](README.it.md) | [Русский](README.ru.md) | [Português (Brasil)](README.pt-BR.md)

---

## 概述

**Laravel Package Search** 是一個 OpenClaw Agent Skill，幫助開發者快速找到、評估和推薦高質量的 Laravel 生態系套件。

[![Packagist](https://img.shields.io/packagist/v/laravel/framework?style=flat-square)](https://packagist.org/packages/laravel/framework)
[![Stars](https://img.shields.io/github/stars/relunctance/laravel-package-search?style=flat-square)](https://github.com/relunctance/laravel-package-search)
[![ClawHub](https://img.shields.io/badge/ClawHub-laravel--package--search-6C43E5?style=flat-square)](https://clawhub.com/laravel-package-search)

---

## 功能特色

- 🔍 **即時 Packagist API** — 每次查詢資料即時更新，絕不過期
- 🗄️ **本地快取（1小時 TTL）** — 重複查詢快速響應
- 🤖 **智慧場景檢測** — 依業務場景找套件（認證、支付、AI 等）
- 📊 **品質評分** — 星星數 × 下載量 × 活躍度 × 相容性
- 📖 **Laravel 文件交叉引用** — 自動連結官方文件（透過 [laravel-docs-reader](https://clawhub.com/laravel-docs-reader)）
- 📦 **直接安裝指令** — `composer require` 複製即用

---

## 快速開始

```
你：「我需要一個 Laravel 11 的權限套件」
Bot：→ 偵測場景：auth
     → 即時 Packagist 搜尋：laravel+auth
     → 回傳排名套件清單，含安裝指令 + Packagist 連結
```

---

## CLI 工具

```bash
php scripts/search.php search <場景> [上限]   # 依場景搜尋（auth, payment, ai...）
php scripts/search.php compare <套件1> <套件2> # 比較兩個套件
php scripts/search.php recommend <需求>       # 自然語言推薦
php scripts/search.php top [上限]             # 前 N 熱門套件（預設 10）
php scripts/search.php scenes                 # 列出全部 22 個場景
```

---

## 支援場景（22個）

| 代碼 | 場景 | Packagist 搜尋 | 熱門套件 |
|------|-------|---------------|----------|
| `auth` | 認證與授權 | [→](https://packagist.org/search?q=laravel+auth) | [spatie/laravel-permission](https://packagist.org/packages/spatie/laravel-permission) |
| `payment` | 支付與帳務 | [→](https://packagist.org/search?q=laravel+payment) | [yansongda/pay](https://packagist.org/packages/yansongda/pay) |
| `search` | 全文搜尋 | [→](https://packagist.org/search?q=laravel+search+scout) | [laravel/scout](https://packagist.org/packages/laravel/scout) |
| `admin` | 管理後台 | [→](https://packagist.org/search?q=laravel+admin+filament) | [filament/filament](https://packagist.org/packages/filament/filament) |
| `queue` | 佇列與任務 | [→](https://packagist.org/search?q=laravel+queue+horizon) | [laravel/horizon](https://packagist.org/packages/laravel/horizon) |
| `excel` | Excel 匯入匯出 | [→](https://packagist.org/search?q=laravel+excel) | [maatwebsite/excel](https://packagist.org/packages/maatwebsite/excel) |
| `media` | 媒體與檔案 | [→](https://packagist.org/search?q=laravel+media) | [spatie/laravel-medialibrary](https://packagist.org/packages/spatie/laravel-medialibrary) |
| `wechat` | 微信 / 小程式 | [→](https://packagist.org/search?q=laravel+wechat) | [overtrue/laravel-wechat](https://packagist.org/packages/overtrue/laravel-wechat) |
| `multitenancy` | 多租戶 SaaS | [→](https://packagist.org/search?q=laravel+multi-tenant) | [stancl/tenancy](https://packagist.org/packages/stancl/tenancy) |
| `ai` | AI / LLM 整合 | [→](https://packagist.org/search?q=laravel+openai+llm) | [openai-php/laravel](https://packagist.org/packages/openai-php/laravel) |
| `ratelimit` | 流量限制 | [→](https://packagist.org/search?q=laravel+rate+limit) | Laravel 內建 |
| `stripe` | Stripe 支付 | [→](https://packagist.org/search?q=laravel+stripe) | [laravel/cashier](https://packagist.org/packages/laravel/cashier) |
| `sms` | SMS 通知 | [→](https://packagist.org/search?q=laravel+sms) | [laravel/twilio](https://packagist.org/packages/laravel/twilio-notification-channel) |
| `logging` | 日誌與稽核 | [→](https://packagist.org/search?q=laravel+log+activity) | [spatie/laravel-activitylog](https://packagist.org/packages/spatie/laravel-activitylog) |
| `api` | API 與 HTTP | [→](https://packagist.org/search?q=laravel+api) | [laravel/sanctum](https://packagist.org/packages/laravel/sanctum) |
| `testing` | 測試 | [→](https://packagist.org/search?q=laravel+testing+pest) | [pestphp/pest](https://packagist.org/packages/pestphp/pest) |
| `cache` | 快取 | [→](https://packagist.org/search?q=laravel+redis+cache) | [predis/predis](https://packagist.org/packages/predis/predis) |
| `email` | 郵件與通知 | [→](https://packagist.org/search?q=laravel+mail) | [laravel/mail](https://packagist.org/packages/laravel/mail) |
| `storage` | 雲端儲存 | [→](https://packagist.org/search?q=laravel+storage+s3) | [league/flysystem-aws-s3-v3](https://packagist.org/packages/league/flysystem-aws-s3-v3) |
| `security` | 安全 | [→](https://packagist.org/search?q=laravel+security) | Laravel 內建 |
| `ui` | 前端 UI | [→](https://packagist.org/search?q=laravel+ui+vue) | [laravel/breeze](https://packagist.org/packages/laravel/breeze) |
| `devtools` | 開發者工具 | [→](https://packagist.org/search?q=laravel+debug+telescope) | [laravel/telescope](https://packagist.org/packages/laravel/telescope) |

---

## Top 20 熱門套件

| 排名 | 套件 | Packagist | GitHub 星 | 用途 | 分數 |
|------|---------|-----------|---------|------|------|
| 1 | [filament/filament](https://packagist.org/packages/filament/filament) | [→](https://packagist.org/packages/filament/filament) | 25k | 管理後台 | 96 |
| 2 | [spatie/laravel-permission](https://packagist.org/packages/spatie/laravel-permission) | [→](https://packagist.org/packages/spatie/laravel-permission) | 25k | RBAC 權限管理 | 95 |
| 3 | [laravel/horizon](https://packagist.org/packages/laravel/horizon) | [→](https://packagist.org/packages/laravel/horizon) | 7k | 佇列監控 | 95 |
| 4 | [laravel/telescope](https://packagist.org/packages/laravel/telescope) | [→](https://packagist.org/packages/laravel/telescope) | 12k | 偵錯 | 94 |
| 5 | [stancl/tenancy](https://packagist.org/packages/stancl/tenancy) | [→](https://packagist.org/packages/stancl/tenancy) | 5k | 多租戶 | 94 |
| 6 | [pestphp/pest](https://packagist.org/packages/pestphp/pest) | [→](https://packagist.org/packages/pestphp/pest) | 11k | 測試框架 | 93 |
| 7 | [laravel/scout](https://packagist.org/packages/laravel/scout) | [→](https://packagist.org/packages/laravel/scout) | 13k | 搜尋引擎 | 92 |
| 8 | [guzzlehttp/guzzle](https://packagist.org/packages/guzzlehttp/guzzle) | [→](https://packagist.org/packages/guzzlehttp/guzzle) | 25k | HTTP 用戶端 | 92 |
| 9 | [spatie/laravel-activitylog](https://packagist.org/packages/spatie/laravel-activitylog) | [→](https://packagist.org/packages/spatie/laravel-activitylog) | 10k | 操作日誌 | 90 |
| 10 | [spatie/laravel-medialibrary](https://packagist.org/packages/spatie/laravel-medialibrary) | [→](https://packagist.org/packages/spatie/laravel-medialibrary) | 10k | 媒體管理 | 90 |
| 11 | [laravel/sanctum](https://packagist.org/packages/laravel/sanctum) | [→](https://packagist.org/packages/laravel/sanctum) | 8k | SPA 認證 | 90 |
| 12 | [spatie/laravel-backup](https://packagist.org/packages/spatie/laravel-backup) | [→](https://packagist.org/packages/spatie/laravel-backup) | 12k | 備份 | 88 |
| 13 | [barryvdh/laravel-dompdf](https://packagist.org/packages/barryvdh/laravel-dompdf) | [→](https://packagist.org/packages/barryvdh/laravel-dompdf) | 12k | PDF 產生 | 88 |
| 14 | [maatwebsite/excel](https://packagist.org/packages/maatwebsite/excel) | [→](https://packagist.org/packages/maatwebsite/excel) | 13k | Excel 處理 | 88 |
| 15 | [tymon/jwt-auth](https://packagist.org/packages/tymon/jwt-auth) | [→](https://packagist.org/packages/tymon/jwt-auth) | 13k | JWT 認證 | 88 |
| 16 | [socialiteproviders/manager](https://packagist.org/packages/socialiteproviders/manager) | [→](https://packagist.org/packages/socialiteproviders/manager) | 10k | 社群登入 | 88 |
| 17 | [laravel/cashier](https://packagist.org/packages/laravel/cashier) | [→](https://packagist.org/packages/laravel/cashier) | 9k | Stripe 帳務 | 90 |
| 18 | [predis/predis](https://packagist.org/packages/predis/predis) | [→](https://packagist.org/packages/predis/predis) | 12k | Redis | 85 |
| 19 | [laravel/breeze](https://packagist.org/packages/laravel/breeze) | [→](https://packagist.org/packages/laravel/breeze) | 10k | 認證起手式 | 85 |
| 20 | [yansongda/pay](https://packagist.org/packages/yansongda/pay) | [→](https://packagist.org/packages/yansongda/pay) | 6k | 支付寶/微信支付 | 88 |

> 執行 `php scripts/search.php top 20` 取得**即時**排名，使用真實 Packagist 資料。

---

## 評分機制

套件即時評分 0-100：

| 指標 | 權重 | 資料來源 |
|------|------|---------|
| GitHub 星數 | 15% | Packagist (github_stars) |
| Packagist 下載量 | 20% | Packagist API |
| 收藏數 | 10% | Packagist (favers) |
| 活躍度（≤30天=100） | 30% | 最後提交時間 |
| Laravel 相容性 | 15% | composer.json |
| 描述品質 | 10% | 非空 = 100 |

---

## 安裝方式

```bash
# 透過 ClawHub CLI 安裝
clawhub install laravel-package-search

# 或從 GitHub 下載
git clone https://github.com/relunctance/laravel-package-search.git
cd laravel-package-search

# 執行 CLI
php scripts/search.php scenes
php scripts/search.php search auth 3
php scripts/search.php recommend "I need WeChat Pay for Laravel 11"
```

---

## 檔案結構

```
laravel-package-search/
├── SKILL.md                      # Skill 規格說明
├── README.md                     # 英文版
├── README.zh-CN.md              # 簡體中文版
├── README.zh-TW.md              # 繁體中文版
├── references/
│   ├── top20-packages.md        # 完整 Top 20 含詳細資訊
│   └── scene-index.md           # 全部 22 個場景含 Packagist 連結
└── scripts/
    └── search.php               # 即時 Packagist CLI
```

---

## laravel-docs-reader 整合

本 Skill 透過 [laravel-docs-reader](https://clawhub.com/laravel-docs-reader) 交叉引用 Laravel 官方文件：

```
✅ spatie/laravel-permission → 授權文件
✅ laravel/scout → 資料庫搜尋文件
✅ laravel/horizon → 佇列文件
✅ laravel/sanctum → SPA 認證文件
✅ filament/filament → filamentphp.com/docs
...
```

---

## 貢獻指南

發現缺少的套件或過時資訊？
- 🐛 [開 Issue](https://github.com/relunctance/laravel-package-search/issues)
- 🔧 [提交 PR](https://github.com/relunctance/laravel-package-search/pulls)

---

## 授權

MIT License | [GitHub](https://github.com/relunctance/laravel-package-search) | [ClawHub](https://clawhub.com/laravel-package-search)
