# Example: Auth & Permission (Chinese)

## 场景需求

**用户**: "我需要一个完整的权限管理系统，支持角色、权限、用户组，最好能控制到页面级别的权限。Laravel 11。"

---

## 🎯 推荐结果

### 最佳选择: spatie/laravel-permission

**推荐指数**: ⭐⭐⭐⭐⭐ 95/100
**维护状态**: 活跃（2026-01 更新）
**兼容性**: Laravel 10 / 11 / 12 ✅

**推荐理由**:
- GitHub 25k Stars，社区认可度最高
- 支持 Roles、Permissions、Direct Permissions
- 与 Gate 和 Middleware 无缝集成
- 文档完整，中文社区活跃

**替代方案**:
- `silber/bouncer` (⭐⭐⭐ 82) - 更轻量，但 Stars 较少
- `artisaninweb/laravel-admin` (⭐⭐⭐ 78) - 集成 admin

**注意事项**:
- 需要对 Permissions 表做索引优化（数据量大时）
- 建议配合 Cache 加速权限检查

---

### 安装步骤

```bash
composer require spatie/laravel-permission
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan migrate
```

### 模型配置 (app/Models/User.php)

```php
<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
```

### 数据库结构

```
roles         — 角色表
permissions   — 权限表
role_has_permissions — 角色-权限关联
model_has_roles      — 用户-角色关联
model_has_permissions — 用户-直接权限关联
```

### 基础使用

```php
// 创建角色
$role = Role::create(['name' => 'writer']);

// 创建权限
$permission = Permission::create(['name' => 'edit posts']);

// 关联
$role->givePermissionTo($permission);
$user->assignRole('writer');

// 检查权限
$user->hasPermissionTo('edit posts');  // true
$user->hasRole('writer');              // true

// 路由中间件
Route::middleware(['role:admin'])->group(function () {
    // 仅管理员可访问
});

// Gate
Gate::allows('edit', $post);
```

### 多语言权限名

```php
// config/permission.php
'permission_names' => function ($permission) {
    return __("permissions.{$permission->name}");
},
```

### 缓存优化

```php
// 性能优化：权限数据量大时开启缓存
// .env
PERMISSION_CACHE=true

// 手动刷新
php artisan cache:forget spatie.permission.cache
php artisan cache:forget spatie.permission.cache.roles
```

---

### 备选方案: tymon/jwt-auth (JWT认证)

如果需要 API Token 认证（非 Session）:

```bash
composer require tymon/jwt-auth
php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
php artisan jwt:secret
```

```php
// User model
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
```

---

## 决策建议

| 场景 | 推荐 |
|------|------|
| 需要完整的 RBAC | spatie/laravel-permission ✅ |
| 需要 JWT Token | tymon/jwt-auth ✅ |
| 需要快速 Admin | filament/filament ✅ |
| 需要 SSO/OAuth | socialiteproviders/manager ✅ |
