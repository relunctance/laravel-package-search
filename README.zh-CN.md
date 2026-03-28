# Laravel Package Search / Laravel 插件搜索助手

**English** | **中文**

---

## 简介

**Laravel Package Search** 是一个 OpenClaw Agent Skill，帮助开发者快速检索、评估和推荐高质量的 Laravel 生态插件。

### 核心功能

- 🔍 **场景化搜索** — 按业务场景检索（认证、支付、多租户、Excel、微信等）
- 🏆 **Top 20 排行榜** — 按 GitHub Stars、Packagist 下载量，维护活跃度排序
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

---

## CLI 工具 — 7 个命令

```bash
php search.php search auth 3              # 按场景搜索（auth/payment/excel/wechat...）
php search.php compare pkg1 pkg2         # 两个包横向对比
php search.php compatible 11             # Laravel 11 兼容的包
php search.php alternatives pkg           # 查找同类替代品
php search.php top 20                    # Top 20 排行榜
php search.php recommend "你的需求"       # 自然语言智能推荐
php search.php scenes                    # 列出全部 17 个场景
```

---

## 支持的场景

| 代码 | 场景 | 最佳插件 |
|------|------|---------|
| `auth` | 认证/权限 | spatie/laravel-permission |
| `payment` | 支付/订单 | yansongda/pay |
| `multitenancy` | 多租户 SaaS | stancl/tenancy |
| `excel` | Excel 导入导出 | maatwebsite/excel |
| `media` | 媒体/文件 | spatie/laravel-medialibrary |
| `wechat` | 微信/短信/推送 | overtrue/laravel-wechat |
| `queue` | 队列/任务 | laravel/horizon |
| `admin` | 后台管理 | filament/filament |
| `search` | 全文检索 | laravel/scout |
| `logging` | 日志/审计 | spatie/laravel-activitylog |
| `api` | API 开发 | guzzlehttp/guzzle |
| `testing` | 测试 | pestphp/pest |
| `cache` | 缓存 | predis/predis |
| `devtools` | 开发工具 | laravel/telescope |

---

## Top 20 插件排行榜

| 排名 | 插件 | 用途 | 评分 |
|------|------|------|------|
| 1 | filament/filament | Admin 后台面板 | 96/100 |
| 2 | spatie/laravel-permission | RBAC 权限管理 | 95/100 |
| 3 | laravel/horizon | 队列监控 | 95/100 |
| 4 | laravel/telescope | 调试助手 | 94/100 |
| 5 | stancl/tenancy | 多租户 SaaS | 94/100 |
| 6 | pestphp/pest | 优雅测试框架 | 93/100 |
| 7 | laravel/scout | 全文搜索 | 92/100 |
| 8 | guzzlehttp/guzzle | HTTP 客户端 | 92/100 |
| 9 | spatie/laravel-activitylog | 操作日志 | 90/100 |
| 10 | spatie/laravel-medialibrary | 媒体管理 | 90/100 |
| 11 | laravel/sanctum | SPA Token 认证 | 90/100 |
| 12 | spatie/laravel-backup | 数据库备份 | 88/100 |
| 13 | barryvdh/laravel-dompdf | PDF 生成 | 88/100 |
| 14 | maatwebsite/excel | Excel 导入导出 | 88/100 |
| 15 | tymon/jwt-auth | JWT 认证 | 88/100 |
| 16 | socialiteproviders/manager | 50+ 平台 OAuth | 88/100 |
| 17 | laravel/fortify | 无头认证后端 | 86/100 |
| 18 | predis/predis | Redis 客户端 | 85/100 |
| 19 | laravel/breeze | 最小化认证脚手架 | 85/100 |
| 20 | barryvdh/laravel-snappy | PDF (wkhtmltopdf) | 82/100 |

完整列表见 `references/top20-packages.md`

---

## 在 OpenClaw 中使用

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

---

## 安装方式

这是 OpenClaw Agent Skill。

```bash
# 使用 ClawHub CLI
clawhub install laravel-package-search

# 或在 https://clawhub.com 提交添加请求
```

---

## 文件结构

```
laravel-package-search/
├── SKILL.md                          # Skill 规范文档
├── README.md                          # 英文版（主）
├── README.zh-CN.md                    # 中文版
├── references/
│   ├── top20-packages.md              # 完整 Top 20 排行榜
│   ├── scene-index.md                 # 场景分类索引
│   └── examples/
│       ├── auth-permission.md         # 认证权限示例
│       ├── payment-wechat.md          # 支付微信示例
│       └── search-fulltext.md         # 全文搜索示例
└── scripts/
    └── search.php                    # CLI 工具（7 个命令）
```

---

## 评估标准

插件评分 0-100，基于：

| 标准 | 权重 | 数据来源 |
|------|------|---------|
| GitHub Stars | 20% | GitHub API |
| Packagist 下载量 | 20% | Packagist API |
| 维护活跃度 | 25% | 最近更新时间 |
| 文档完整性 | 15% | 人工审核 |
| Laravel 兼容性 | 10% | composer.json |
| 安全性 | 10% | 安全公告 |

### 活跃度评分 (0-100)

| 最后更新 | 评分 |
|---------|------|
| 1 个月内 | 100 |
| 3 个月内 | 80 |
| 6 个月内 | 60 |
| 1 年内 | 40 |
| 2 年内 | 20 |
| 超过 2 年 | 0 |

---

## 参与贡献

发现遗漏的插件或过时信息？
- 在 https://github.com/relunctance/laravel-package-search 提交 PR
- 或提交 Issue

---

## 许可证

MIT License
