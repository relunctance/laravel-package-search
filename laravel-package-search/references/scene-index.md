# Scene Category Index

## Index

| Code | Scene (EN) | Scene (CN) | Top Package |
|------|-----------|------------|-------------|
| `auth` | Authentication & Authorization | 认证/权限 | spatie/laravel-permission |
| `payment` | Payment & Orders | 支付/订单 | omnipay/omnipay |
| `multitenancy` | Multi-tenancy | 多租户 | stancl/tenancy |
| `excel` | Excel Import/Export | Excel导入导出 | maatwebsite/excel |
| `media` | Media & Files | 媒体/文件 | spatie/laravel-medialibrary |
| `wechat` | WeChat/Wechat SDK | 微信/短信/推送 | overtrue/laravel-wechat |
| `queue` | Queue & Jobs | 队列/任务 | laravel/horizon |
| `admin` | Admin Panel | 后台管理 | filament/filament |
| `search` | Full-text Search | 搜索/全文检索 | laravel/scout |
| `logging` | Logging & Audit | 日志/审计 | spatie/laravel-activitylog |
| `api` | API & SDK | API开发 | laravel/sanctum |
| `testing` | Testing | 测试 | pestphp/pest |
| `cache` | Caching | 缓存 | predis/predis |
| `validation` | Validation | 数据验证 | laravel/rules |
| `migration` | Database Migrations | 数据库迁移 | laravel-migrations |
| `ui` | Frontend UI | 前端UI | inertiajs/inertia |
| `email` | Email & Notifications | 邮件通知 | laravel/mail |
| `storage` | Cloud Storage | 云存储 | league/flysystem-aws-s3-v3 |
| `security` | Security | 安全防护 | laravel/security |
| `devtools` | Developer Tools | 开发工具 | barryvdh/laravel-debugbar |

---

## Detail Maps

### auth — Authentication & Authorization

| Package | Score | Use Case |
|---------|-------|----------|
| spatie/laravel-permission | ⭐⭐⭐⭐⭐ 95 | RBAC with roles & permissions |
| tymon/jwt-auth | ⭐⭐⭐⭐ 88 | JWT token authentication |
| laravel/sanctum | ⭐⭐⭐⭐ 90 | SPA token authentication |
| laravel/fortify | ⭐⭐⭐⭐ 86 | Headless auth backend |
| laravel/breeze | ⭐⭐⭐⭐ 85 | Minimal starter kit |
| socialiteproviders/manager | ⭐⭐⭐⭐ 88 | 50+ social OAuth |

---

### payment — Payment & Orders

| Package | Score | Use Case |
|---------|-------|----------|
| omnipay/omnipay | ⭐⭐⭐⭐ 82 | Unified payment gateway |
| overtrue/laravel-wechat | ⭐⭐⭐ 75 | WeChat Pay |
| barryvdh/laravel-dompdf | ⭐⭐⭐⭐ 88 | Invoice PDF generation |
| novamedia/laravel-stripe | ⭐⭐⭐ 72 | Stripe integration |
| mercadopago/sdk-php | ⭐⭐⭐ 70 | MercadoPago (LATAM) |

---

### multitenancy — Multi-tenancy

| Package | Score | Use Case |
|---------|-------|----------|
| stancl/tenancy | ⭐⭐⭐⭐⭐ 94 | Automatic per-tenant DB/Redis |
| romegadigital/multitenancy | ⭐⭐⭐ 78 | Manual tenant switching |
| hyn/multi-tenant | ⭐⭐⭐ 76 | (Deprecated, use stancl) |

---

### excel — Excel Import/Export

| Package | Score | Use Case |
|---------|-------|----------|
| maatwebsite/excel | ⭐⭐⭐⭐ 88 | All-in-one Excel solution |
| phpoffice/phpspreadsheet | ⭐⭐⭐⭐ 85 | Raw spreadsheet library |
| fast-excel | ⭐⭐⭐ 78 | Fast large file handling |

---

### search — Full-text Search

| Package | Score | Use Case |
|---------|-------|----------|
| laravel/scout | ⭐⭐⭐⭐⭐ 92 | Algolia/MeiliSearch/Typesense |
| elastic/elasticsearch-laravel | ⭐⭐⭐⭐ 88 | Elasticsearch official |
| matchish/laravel-scout-elasticsearch | ⭐⭐⭐ 78 | Elasticsearch via Scout |
| typesense/typesense-laravel-scout | ⭐⭐⭐ 80 | Typesense via Scout |

---

### admin — Admin Panel

| Package | Score | Use Case |
|---------|-------|----------|
| filament/filament | ⭐⭐⭐⭐⭐ 96 | Modern, livewire-based |
| laravel-admin | ⭐⭐⭐⭐ 85 | Traditional admin panel |
| Voyager | ⭐⭐⭐ 80 | BREAD system |
| octalpeak/laralum | ⭐⭐ 65 | Minimal admin |

---

### wechat — WeChat / SMS / Push

| Package | Score | Use Case |
|---------|-------|----------|
| overtrue/laravel-wechat | ⭐⭐⭐ 75 | WeChat (mini/OA/pay) |
| laravel/twilio-notification-channel | ⭐⭐⭐⭐ 85 | Twilio SMS/Push |
| laravel/fcm-notification | ⭐⭐⭐ 72 | Firebase Cloud Messaging |

---

### queue — Queue & Job Scheduling

| Package | Score | Use Case |
|---------|-------|----------|
| laravel/horizon | ⭐⭐⭐⭐⭐ 95 | Redis queue monitoring |
| laravel/telescope | ⭐⭐⭐⭐⭐ 94 | Application debugging |
| laravel/horizon | ⭐⭐⭐⭐⭐ 95 | Queue management |
| jobcloud/pheanstalk | ⭐⭐⭐ 78 | Beanstalkd support |

---

## Search Examples

### Query → Scene Mapping

| User Query | Scene | Key Packages |
|------------|-------|-------------|
| "权限管理" | auth | spatie/laravel-permission |
| "用户角色" | auth | bouncer, laravel-permission |
| "微信支付" | wechat | overtrue/laravel-wechat |
| "Excel导出" | excel | maatwebsite/excel |
| "全文搜索" | search | laravel/scout |
| "多租户SaaS" | multitenancy | stancl/tenancy |
| "后台管理" | admin | filament/filament |
| "PDF生成" | payment | barryvdh/laravel-dompdf |
| "活动日志" | logging | spatie/laravel-activitylog |
| "API认证" | api | laravel/sanctum |
| "JWT登录" | api | tymon/jwt-auth |
| "Redis缓存" | cache | predis/predis |
| "测试覆盖率" | testing | pestphp/pest |
