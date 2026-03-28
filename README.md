# Laravel Package Search / Laravel 插件搜索助手

[English](#english) | [中文](#中文)

---

## English

### What is this?

**Laravel Package Search** is an OpenClaw Agent Skill that helps developers quickly find, evaluate, and recommend high-quality Laravel ecosystem packages.

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

### Supported Scenes

| Code | Scene | Examples |
|------|-------|----------|
| `auth` | Authentication & RBAC | spatie/laravel-permission, tymon/jwt-auth |
| `payment` | Payment & Orders | omnipay, yansongda/pay, stripe |
| `multitenancy` | Multi-tenancy | stancl/tenancy |
| `excel` | Excel Import/Export | maatwebsite/excel |
| `media` | Media Management | spatie/laravel-medialibrary |
| `wechat` | WeChat SDK | overtrue/laravel-wechat |
| `queue` | Queue & Jobs | laravel/horizon |
| `admin` | Admin Panel | filament/filament, laravel-admin |
| `search` | Full-text Search | laravel/scout, elasticsearch |
| `logging` | Logging & Audit | spatie/laravel-activitylog |

### Usage in OpenClaw

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

### Installation

This is an OpenClaw Agent Skill. To install:

```bash
# Using ClawHub CLI
clawhub install laravel-package-search

# Or submit a request at https://clawhub.com
```

### Top 20 Packages Overview

| Rank | Package | Use Case | Score |
|------|---------|----------|-------|
| 1 | spatie/laravel-permission | RBAC Permissions | 95/100 |
| 2 | laravel/scout | Full-text Search | 92/100 |
| 3 | filament/filament | Admin Panel | 96/100 |
| 4 | maatwebsite/excel | Excel Import/Export | 88/100 |
| 5 | laravel/horizon | Queue Monitoring | 95/100 |
| 6 | barryvdh/laravel-dompdf | PDF Generation | 88/100 |
| 7 | spatie/laravel-activitylog | Activity Logging | 90/100 |
| 8 | tymon/jwt-auth | JWT Auth | 88/100 |
| 9 | laravel/telescope | Debugging | 94/100 |
| 10 | overtrue/laravel-wechat | WeChat SDK | 75/100 |

See `references/top20-packages.md` for the complete list.

### File Structure

```
laravel-package-search/
├── SKILL.md                          # Skill specification
├── README.md                          # This file
├── references/
│   ├── top20-packages.md              # Top 20 package rankings
│   ├── scene-index.md                 # Scene category index
│   └── examples/
│       ├── auth-permission.md         # Auth example (Chinese)
│       ├── payment-wechat.md          # Payment example (Chinese)
│       └── search-fulltext.md         # Search example (Chinese)
└── scripts/
    └── search.php                    # Optional CLI search script
```

### Evaluation Criteria

Packages are scored 0-100 based on:

| Criterion | Weight | Source |
|-----------|--------|--------|
| GitHub Stars | 20% | GitHub API |
| Packagist Downloads | 20% | Packagist API |
| Maintenance Activity | 25% | Last commit date |
| Documentation | 15% | Manual review |
| Laravel Compatibility | 10% | composer.json |
| Security | 10% | Security advisories |

### Contributing

Found a missing package or outdated info?
- Submit a PR at https://github.com/relunctance/laravel-package-search
- Or open an issue

### License

MIT License

---

## 中文

### 这是什么？

**Laravel Package Search** 是一个 OpenClaw Agent Skill，帮助开发者快速检索、评估和推荐高质量的 Laravel 生态插件。

### 核心功能

- 🔍 **场景化搜索** — 按业务场景检索（认证、支付、多租户、Excel、微信等）
- 🏆 **Top 20 排行榜** — 按 GitHub Stars、Packagist 下载量、维护活跃度排序
- 🤖 **智能推荐** — 根据实际需求智能匹配最佳插件
- 📊 **插件评估** — 自动评估 GitHub Stars、文档、兼容性、安全性
- 📦 **安装配置** — 提供 composer 命令和配置示例
- 🔄 **版本兼容** — 自动提示 Laravel 10/11/12 兼容性

### 快速开始

```
你: "我需要一个 Laravel 11 的权限管理包"
麒麟: [自动识别场景：auth]
     [搜索 Top20 + 场景数据库]
     [返回排名推荐，含安装命令]
```

### 支持的场景

| 代码 | 场景 | 代表插件 |
|------|------|---------|
| `auth` | 认证/权限 | spatie/laravel-permission, tymon/jwt-auth |
| `payment` | 支付/订单 | omnipay, yansongda/pay, stripe |
| `multitenancy` | 多租户 | stancl/tenancy |
| `excel` | Excel导入导出 | maatwebsite/excel |
| `media` | 媒体/文件 | spatie/laravel-medialibrary |
| `wechat` | 微信/短信/推送 | overtrue/laravel-wechat |
| `queue` | 队列/任务 | laravel/horizon |
| `admin` | 后台管理 | filament/filament, laravel-admin |
| `search` | 全文检索 | laravel/scout, elasticsearch |
| `logging` | 日志/审计 | spatie/laravel-activitylog |

### 在 OpenClaw 中使用

激活后，Skill 会：

1. 解析你的需求（中英文均可）
2. 映射到对应场景分类
3. 搜索 Top20 数据库 + 场景索引
4. 返回前 3 名推荐，含：
   - 推荐评分
   - 安装命令
   - 配置示例
   - 兼容性说明
   - 替代方案

### 安装方式

这是 OpenClaw Agent Skill，安装方式：

```bash
# 使用 ClawHub CLI
clawhub install laravel-package-search

# 或在 https://clawhub.com 提交添加请求
```

### Top 20 插件概览

| 排名 | 插件 | 用途 | 评分 |
|------|------|------|------|
| 1 | spatie/laravel-permission | RBAC 权限管理 | 95/100 |
| 2 | filament/filament | Admin 后台面板 | 96/100 |
| 3 | laravel/scout | 全文搜索 | 92/100 |
| 4 | laravel/horizon | 队列监控 | 95/100 |
| 5 | laravel/telescope | 调试助手 | 94/100 |
| 6 | maatwebsite/excel | Excel 导入导出 | 88/100 |
| 7 | barryvdh/laravel-dompdf | PDF 生成 | 88/100 |
| 8 | spatie/laravel-activitylog | 操作日志 | 90/100 |
| 9 | tymon/jwt-auth | JWT 认证 | 88/100 |
| 10 | spatie/laravel-backup | 数据库备份 | 88/100 |

完整列表见 `references/top20-packages.md`

### 文件结构

```
laravel-package-search/
├── SKILL.md                          # Skill 规范文档
├── README.md                          # 本文件（中英文）
├── references/
│   ├── top20-packages.md              # Top 20 插件排行榜
│   ├── scene-index.md                 # 场景分类索引
│   └── examples/
│       ├── auth-permission.md         # 认证权限示例
│       ├── payment-wechat.md          # 支付微信示例
│       └── search-fulltext.md         # 全文搜索示例
└── scripts/
    └── search.php                    # 可选 CLI 搜索脚本
```

### 评估标准

插件评分 0-100，基于：

| 标准 | 权重 | 数据来源 |
|------|------|---------|
| GitHub Stars | 20% | GitHub API |
| Packagist 下载量 | 20% | Packagist API |
| 维护活跃度 | 25% | 最近更新时间 |
| 文档完整性 | 15% | 人工审核 |
| Laravel 兼容性 | 10% | composer.json |
| 安全性 | 10% | 安全公告 |

### 参与贡献

发现遗漏的插件或过时信息？
- 在 https://github.com/relunctance/laravel-package-search 提交 PR
- 或提交 Issue

### 许可证

MIT License
