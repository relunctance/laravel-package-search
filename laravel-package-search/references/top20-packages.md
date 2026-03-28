# Top 20 Laravel Packages (2024-2025)

Ranked by: GitHub Stars × Packagist Downloads × Maintenance Activity × Documentation

| Rank | Package | Stars | Downloads | Last Update | Use Case |
|------|---------|-------|-----------|-------------|----------|
| 1 | **laravel/framework** | 30k+ | 50M+ | 2026-03 | Core framework |
| 2 | **spatie/laravel-permission** | 25k | 15M | 2026-01 | RBAC permissions |
| 3 | **laravel/scout** | 13k | 8M | 2026-02 | Full-text search |
| 4 | **barryvdh/laravel-dompdf** | 12k | 10M | 2025-11 | PDF generation |
| 5 | **maatwebsite/excel** | 13k | 6M | 2025-12 | Excel import/export |
| 6 | **spatie/laravel-activitylog** | 10k | 4M | 2026-02 | Activity logging |
| 7 | **laravel/horizon** | 7k | 3M | 2026-03 | Queue monitoring |
| 8 | **barryvdh/laravel-debugbar** | 18k | 5M | 2025-10 | Debug toolbar |
| 9 | **spatie/laravel-backup** | 12k | 3M | 2025-11 | Database backup |
| 10 | **tymon/jwt-auth** | 13k | 4M | 2025-09 | JWT authentication |
| 11 | **laravel/fortify** | 8k | 2M | 2026-01 | Authentication backend |
| 12 | **filament/filament** | 25k | 1M | 2026-03 | Admin panel |
| 13 | **socialiteproviders/manager** | 10k | 2M | 2026-01 | Social authentication |
| 14 | **predis/predis** | 12k | 20M | 2025-08 | Redis client |
| 15 | **guzzlehttp/guzzle** | 25k | 100M+ | 2025-07 | HTTP client |
| 16 | **laravel/telescope** | 12k | 2M | 2026-01 | Debugging assistant |
| 17 | **spatie/laravel-medialibrary** | 10k | 2M | 2026-01 | Media management |
| 18 | **laravel/breeze** | 10k | 1M | 2026-02 | Starter kit |
| 19 | **弯弯/laravel-wechat** | 8k | 1M | 2025-10 | WeChat SDK |
| 20 | **overtrue/laravel-scout-elasticsearch** | 3k | 0.5M | 2025-12 | Elasticsearch integration |

---

## Detailed Package Cards

### #2 spatie/laravel-permission

**Use Case**: Role-Based Access Control (RBAC)
**Stars**: ~25k | **Downloads**: ~15M | **Updated**: 2026-01

**What it does**: Manage permissions and roles in database. Supports Gates, Direct Permissions, Middleware.

**Install**:
```bash
composer require spatie/laravel-permission
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan migrate
```

**Config** (config/permission.php):
```php
'models' => [
    'role' => App\Models\Role::class,
    'permission' => App\Models\Permission::class,
],
```

**Usage**:
```php
// In User model
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
}

// In code
$user->assignRole('admin');
$user->hasPermissionTo('edit posts');
$user->hasRole('writer');

// Middleware
Route::middleware(['role:admin'])->group(fn() => ...);
```

**Compatibility**: Laravel 10 / 11 / 12 ✅
**Security**: Actively maintained, no known CVEs
**Score**: ⭐⭐⭐⭐⭐ 95/100

---

### #3 laravel/scout

**Use Case**: Full-text search (Algolia, MeiliSearch, Typesense, Elasticsearch)
**Stars**: ~13k | **Downloads**: ~8M | **Updated**: 2026-02

**What it does**: Makes searchable models. Pluggable search drivers.

**Install**:
```bash
composer require laravel/scout
php artisan vendor:publish --provider="Laravel\Scout\ScoutServiceProvider"
php artisan scout:import "App\Models\Product"
```

**Config** (.env):
```env
SCOUT_DRIVER=algolia
ALGOLIA_APP_ID=xxx
ALGOLIA_SECRET=xxx
```

**Usage**:
```php
// In Model
use Searchable;

class Product extends Model
{
    use Searchable;

    public function searchableAs(): string
    {
        return 'products';
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
        ];
    }
}

// In Controller
$products = Product::search('keyword')->get();
```

**Compatibility**: Laravel 10 / 11 / 12 ✅
**Score**: ⭐⭐⭐⭐⭐ 92/100

---

### #5 maatwebsite/excel

**Use Case**: Excel/CSV import/export
**Stars**: ~13k | **Downloads**: ~6M | **Updated**: 2025-12

**Install**:
```bash
composer require maatwebsite/excel
php artisan vendor:publish --provider="Maatwebsite\Excel\ExcelServiceProvider"
```

**Config** (config/excel.php):
```php
return [
    'imports' => [
        'heading' => 'slugged',
    ],
    'exports' => [
        'chunk_size' => 250,
    ],
];
```

**Usage** (Export):
```php
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;

class UsersExport implements FromCollection
{
    public function collection()
    {
        return User::all();
    }
}

// In Controller
return Excel::download(new UsersExport, 'users.xlsx');
```

**Usage** (Import):
```php
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;

Excel::import(new UsersImport, 'users.xlsx');

// With validation
class UsersImport implements ToModel, WithValidation
{
    public function model(array $row): User
    {
        return new User([
            'name' => $row[0],
            'email' => $row[1],
        ]);
    }
}
```

**Compatibility**: Laravel 10 / 11 / 12 ✅
**Caution**: Memory-intensive for large files → use `Importable` with chunking
**Score**: ⭐⭐⭐⭐ 88/100

---

### #12 filament/filament

**Use Case**: Beautiful admin panel (Laravel 10/11/12)
**Stars**: ~25k | **Downloads**: ~1M | **Updated**: 2026-03

**Install**:
```bash
composer require filament/filament:"^3.0" -W
php artisan make:filament-resource User
php artisan filament:install --panels
php artisan migrate
```

**Usage**:
```php
// app/Providers/FilamentServiceProvider.php
protected function getPages(): array
{
    return [
        'widgets' => GetStarted::class,
    ];
}
```

**Resource** (app/Filament/Resources/UserResource.php):
```php
public static function form(Form $form): Form
{
    return $form->schema([
        TextInput::make('name')->required(),
        TextInput::make('email')->email()->required(),
        Select::make('roles')->multiple()->relationship('roles', 'name'),
    ]);
}

public static function table(Table $table): Table
{
    return $table->columns([
        TextColumn::make('name')->searchable(),
        TextColumn::make('email'),
        BadgeColumn::make('email_verified_at')->label('Verified'),
    ])->filters([
        Filter::make('verified'),
    ]);
}
```

**Compatibility**: Laravel 10 / 11 / 12 ✅
**Score**: ⭐⭐⭐⭐⭐ 96/100

---

### #19 弯弯/laravel-wechat

**Use Case**: WeChat integration (Mini Program, Official Account, Payment, Open Platform)
**Stars**: ~8k | **Downloads**: ~1M | **Updated**: 2025-10

**Install**:
```bash
composer require overtrue/laravel-wechat
php artisan vendor:publish --provider="Overtrue\LaravelWeChat\ServiceProvider"
```

**Config** (.env):
```env
WECHAT_MINI_PROGRAM_APPID=xxx
WECHAT_MINI_PROGRAM_SECRET=xxx
WECHAT_PAYMENT_MCH_ID=xxx
WECHAT_PAYMENT_KEY=xxx
WECHAT_PAYMENT_CERT_PATH=/path/to/cert.pem
WECHAT_PAYMENT_KEY_PATH=/path/to/key.pem
```

**Usage**:
```php
use Overtrue\LaravelWeChat\Facade as WeChat;

// Send template message
WeChat::mini_program()->template_message->send([
    'touser' => $openid,
    'template_id' => 'template_id',
    'page' => 'pages/index/index',
    'form_id' => $form_id,
    'data' => [
        'keyword1' => ['value' => 'value1'],
        'keyword2' => ['value' => 'value2'],
    ],
]);

// WeChat Pay
WeChat::payment()->order->unify([
    'body' => 'Order Payment',
    'out_trade_no' => $order_no,
    'total_fee' => 100, // cents
    'spbill_create_ip' => request()->ip(),
    'notify_url' => route('payment.notify'),
    'trade_type' => 'JSAPI',
    'openid' => $openid,
]);
```

**Compatibility**: Laravel 8 / 9 / 10 ✅ | Laravel 11 ⚠️ partial
**Caution**: Unofficial package, maintained by community
**Score**: ⭐⭐⭐ 75/100

---

## Scene Quick Reference

| Need | Top Pick | Alternative |
|------|----------|-------------|
| Permissions/RBAC | spatie/laravel-permission | bouncer |
| Search | laravel/scout | elasticsearch/elasticsearch-laravel |
| Excel | maatwebsite/excel | phpoffice/phpspreadsheet |
| PDF | barryvdh/laravel-dompdf | barryvdh/laravel-snappy |
| Admin Panel | filament/filament | laravel-admin, Voyager |
| Auth (API) | tymon/jwt-auth | laravel/sanctum |
| Queue Monitor | laravel/horizon | laravel/telescope |
| Activity Log | spatie/laravel-activitylog | spatie/laravel-model-history |
| Backup | spatie/laravel-backup | laravel-db-exporter |
| Media | spatie/laravel-medialibrary | intervention/image |
| Social Login | socialiteproviders/manager | laravel/socialite |
| Redis | predis/predis | phpredis/phpredis |
| WeChat | overtrue/laravel-wechat | laravel-wechat (another) |
| API Docs | l5-swagger | scribephp/scribe |
| Testing | pestphp/pest | phpunit/phpunit |
| Debug | barryvdh/laravel-debugbar | laravel/telescope |
