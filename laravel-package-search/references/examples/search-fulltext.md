# Example: Full-text Search (Chinese)

## 场景需求

**用户**: "我要给产品表加搜索功能，支持关键词匹配、拼音搜索、分类筛选。数据量 10 万左右。"

---

## 🎯 推荐结果

### 最佳选择: laravel/scout + MeiliSearch

**推荐指数**: ⭐⭐⭐⭐⭐ 92/100
**维护状态**: 活跃（2026-02 更新）
**兼容性**: Laravel 10 / 11 / 12 ✅

**推荐理由**:
- Scout 是 Laravel 官方推荐搜索方案
- MeiliSearch 开源、搜索速度快、支持中文拼音
- 零配置迁移，现有 Model 改动最小
- 支持实时搜索、筛选、排序

**替代方案**:
- `elastic/elasticsearch-laravel` (⭐⭐⭐⭐ 88) - 更强但配置复杂
- `typesense/typesense-laravel-scout` (⭐⭐⭐ 80) - Typesense 更轻量

---

### 安装步骤

```bash
composer require laravel/scout
php artisan vendor:publish --provider="Laravel\Scout\ScoutServiceProvider"

# 安装 MeiliSearch (Docker)
docker run -d -p 7700:7700 \
  -v $(pwd)/meili_data:/meili_data \
  getmeili/meilisearch:latest

# 安装 Scout MeiliSearch 驱动
composer require meilisearch/meilisearch-php http-interop/http-factory-guzzle
```

### 配置 (.env)

```env
SCOUT_DRIVER=meilisearch
MEILISEARCH_HOST=http://127.0.0.1:7700
MEILISEARCH_KEY=masterKey
```

### 模型配置 (app/Models/Product.php)

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use Searchable;

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'price',
        'is_active',
    ];

    // 索引名称
    public function searchableAs(): string
    {
        return 'products';
    }

    // 可搜索字段（权重：name > description）
    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'name_pinyin' => $this->pinyin ?? '',  // 需额外字段
            'description' => $this->description,
            'category_id' => $this->category_id,
            'category_name' => $this->category?->name,
            'price' => $this->price,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at?->timestamp,
        ];
    }

    // 搜索时的条件过滤（自动应用）
    public function shouldSearchable(): bool
    {
        return $this->is_active;
    }

    // 关联分类
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
```

### 数据迁移（添加拼音字段）

```bash
php artisan make:migration add_pinyin_to_products_table
```

```php
public function up(): void
{
    Schema::table('products', function (Blueprint $table) {
        $table->string('pinyin')->nullable()->index()->after('name');
    });
}
```

### 生成拼音（安装 overtrue/pinyin）

```bash
composer require overtrue/pinyin
```

```php
// model boot 中自动生成拼音
protected static function boot()
{
    parent::boot();

    static::saving(function ($product) {
        $product->pinyin = \Overtrue\Pinyin\Pinyin::permalink($product->name, '');
    });
}
```

### 搜索控制器 (app/Http/Controllers/SearchController.php)

```php
<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('q', '');
        $categoryId = $request->input('category_id');
        $sort = $request->input('sort', 'relevance'); // relevance | price_asc | price_desc | newest

        $builder = Product::search($query);

        // 分类筛选
        if ($categoryId) {
            $builder->where('category_id', $categoryId);
        }

        // 排序
        match ($sort) {
            'price_asc' => $builder->orderBy('price', 'asc'),
            'price_desc' => $builder->orderBy('price', 'desc'),
            'newest' => $builder->orderBy('created_at', 'desc'),
            default => $builder->orderBy('_score', 'desc'),
        };

        // 分页
        $products = $builder->paginate(20);

        return response()->json($products);
    }
}
```

### MeiliSearch 中文配置

```php
// config/scout.php
'meilisearch' => [
    'host' => env('MEILISEARCH_HOST', 'http://127.0.0.1:7700'),
    'key' => env('MEILISEARCH_KEY'),
    'index-settings' => [
        'products' => [
            'filterableAttributes' => ['category_id', 'is_active', 'price'],
            'sortableAttributes' => ['price', 'created_at'],
            'searchableAttributes' => ['name', 'name_pinyin', 'description', 'category_name'],
            'typoTolerance' => [
                'enabled' => true,
                'minWordSizeForTypos' => [
                    'oneTypo' => 3,
                    'twoTypos' => 6,
                ],
            ],
        ],
    ],
],
```

### 路由 (routes/api.php)

```php
use App\Http\Controllers\SearchController;

Route::get('/search/products', [SearchController::class, 'search']);
```

### 初始导入

```bash
# 导入所有产品到 MeiliSearch
php artisan scout:import "App\Models\Product"

# 监听数据库变化自动同步（Scout 自动处理）
# 无需额外配置
```

---

## 替代: elastic/elasticsearch-laravel

如果数据量超过 100 万，或需要复杂的聚合分析:

```bash
composer require elastic/elasticsearch-laravel
```

---

## 决策建议

| 数据量 | 推荐方案 |
|--------|---------|
| < 10万 | laravel/scout + MeiliSearch ✅ |
| 10-100万 | laravel/scout + MeiliSearch ✅（加钱升级配置） |
| > 100万 | elasticsearch-laravel ✅ |
| 极简需求 | Algolia (免费额度 10k records) ✅ |

---

## 性能对比

| 驱动 | 搜索速度 | 内存占用 | 中文支持 | 配置难度 |
|------|---------|---------|---------|---------|
| MeiliSearch | ~50ms | 低 | 好 | 简单 |
| Algolia | ~20ms | 低 | 一般 | 简单 |
| Elasticsearch | ~100ms | 高 | 好 | 复杂 |
| Typesense | ~30ms | 低 | 一般 | 中等 |
