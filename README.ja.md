# Laravel Package Search

**English** | [中文](README.zh-CN.md) | [繁體中文](README.zh-TW.md) | [日本語](README.ja.md) | [한국어](README.ko.md) | [Français](README.fr.md) | [Español](README.es.md) | [Deutsch](README.de.md) | [Italiano](README.it.md) | [Русский](README.ru.md) | [Português (Brasil)](README.pt-BR.md)

---

## 概要

**Laravel Package Search** は、開発者が高品質な Laravel エコシステムパッケージを迅速に見つけ、評価、推奨する OpenClaw Agent Skill です。

[![Packagist](https://img.shields.io/packagist/v/laravel/framework?style=flat-square)](https://packagist.org/packages/laravel/framework)
[![Stars](https://img.shields.io/github/stars/relunctance/laravel-package-search?style=flat-square)](https://github.com/relunctance/laravel-package-search)
[![ClawHub](https://img.shields.io/badge/ClawHub-laravel--package--search-6C43E5?style=flat-square)](https://clawhub.com/laravel-package-search)

---

## 機能

- 🔍 **リアルタイム Packagist API** — データは常に新鮮で、毎回ライブ取得
- 🗄️ **ローカルキャッシュ（1時間 TTL）** — 重复クエリも高速
- 🤖 **スマートシーン検出** — ビジネスシーンでパッケージを検索（認証、支払い、AIなど）
- 📊 **品質スコア** — スター数 × ダウンロード数 × アクティビティ × 互換性
- 📖 **Laravel ドキュメント相互参照** — 公式ドキュメントへの自動リンク（[laravel-docs-reader](https://clawhub.com/laravel-docs-reader)経由）
- 📦 **的直接インストールコマンド** — `composer require` をコピーしてすぐ使用

---

## クイックスタート

```
あなた：「Laravel 11用の権限パッケージが必要です」
Bot：→ シーン検出：auth
     → リアルタイム Packagist 検索：laravel+auth
     → ランキング済みパッケージリストを返回（インストールコマンド + Packagistリンク付き）
```

---

## CLI ツール

```bash
php scripts/search.php search <シーン> [上限]     # シーンで検索（auth, payment, ai...）
php scripts/search.php compare <pkg1> <pkg2>     # 2つのパッケージを比較
php scripts/search.php recommend <要件>          # 自然言語による推奨
php scripts/search.php top [上限]                # 上位Nパッケージ（デフォルト10）
php scripts/search.php scenes                    # 全22シーンを一覧表示
```

---

## 対応シーン（22）

| コード | シーン | Packagist 検索 | トップパッケージ |
|--------|--------|---------------|-----------------|
| `auth` | 認証・認可 | [→](https://packagist.org/search?q=laravel+auth) | [spatie/laravel-permission](https://packagist.org/packages/spatie/laravel-permission) |
| `payment` | 決済・請求 | [→](https://packagist.org/search?q=laravel+payment) | [yansongda/pay](https://packagist.org/packages/yansongda/pay) |
| `search` | 全文検索 | [→](https://packagist.org/search?q=laravel+search+scout) | [laravel/scout](https://packagist.org/packages/laravel/scout) |
| `admin` | 管理パネル | [→](https://packagist.org/search?q=laravel+admin+filament) | [filament/filament](https://packagist.org/packages/filament/filament) |
| `queue` | キュー・ジョブ | [→](https://packagist.org/search?q=laravel+queue+horizon) | [laravel/horizon](https://packagist.org/packages/laravel/horizon) |
| `excel` | Excel インポート/エクスポート | [→](https://packagist.org/search?q=laravel+excel) | [maatwebsite/excel](https://packagist.org/packages/maatwebsite/excel) |
| `media` | メディア・ファイル | [→](https://packagist.org/search?q=laravel+media) | [spatie/laravel-medialibrary](https://packagist.org/packages/spatie/laravel-medialibrary) |
| `wechat` | WeChat・小プログラム | [→](https://packagist.org/search?q=laravel+wechat) | [overtrue/laravel-wechat](https://packagist.org/packages/overtrue/laravel-wechat) |
| `multitenancy` | マルチテナンシー SaaS | [→](https://packagist.org/search?q=laravel+multi-tenant) | [stancl/tenancy](https://packagist.org/packages/stancl/tenancy) |
| `ai` | AI / LLM 連携 | [→](https://packagist.org/search?q=laravel+openai+llm) | [openai-php/laravel](https://packagist.org/packages/openai-php/laravel) |
| `ratelimit` | レートリミット | [→](https://packagist.org/search?q=laravel+rate+limit) | Laravel 組み込み |
| `stripe` | Stripe 決済 | [→](https://packagist.org/search?q=laravel+stripe) | [laravel/cashier](https://packagist.org/packages/laravel/cashier) |
| `sms` | SMS 通知 | [→](https://packagist.org/search?q=laravel+sms) | [laravel/twilio](https://packagist.org/packages/laravel/twilio-notification-channel) |
| `logging` | ロギング・監査 | [→](https://packagist.org/search?q=laravel+log+activity) | [spatie/laravel-activitylog](https://packagist.org/packages/spatie/laravel-activitylog) |
| `api` | API・HTTP | [→](https://packagist.org/search?q=laravel+api) | [laravel/sanctum](https://packagist.org/packages/laravel/sanctum) |
| `testing` | テスト | [→](https://packagist.org/search?q=laravel+testing+pest) | [pestphp/pest](https://packagist.org/packages/pestphp/pest) |
| `cache` | キャッシュ | [→](https://packagist.org/search?q=laravel+redis+cache) | [predis/predis](https://packagist.org/packages/predis/predis) |
| `email` | メール・通知 | [→](https://packagist.org/search?q=laravel+mail) | [laravel/mail](https://packagist.org/packages/laravel/mail) |
| `storage` | クラウドストレージ | [→](https://packagist.org/search?q=laravel+storage+s3) | [league/flysystem-aws-s3-v3](https://packagist.org/packages/league/flysystem-aws-s3-v3) |
| `security` | セキュリティ | [→](https://packagist.org/search?q=laravel+security) | Laravel 組み込み |
| `ui` | フロントエンド UI | [→](https://packagist.org/search?q=laravel+ui+vue) | [laravel/breeze](https://packagist.org/packages/laravel/breeze) |
| `devtools` | デベロッパーツール | [→](https://packagist.org/search?q=laravel+debug+telescope) | [laravel/telescope](https://packagist.org/packages/laravel/telescope) |

---

## Top 20 パッケージ

| 順位 | パッケージ | Packagist | スター | 用途 | スコア |
|------|-----------|-----------|--------|------|--------|
| 1 | [filament/filament](https://packagist.org/packages/filament/filament) | [→](https://packagist.org/packages/filament/filament) | 25k | 管理パネル | 96 |
| 2 | [spatie/laravel-permission](https://packagist.org/packages/spatie/laravel-permission) | [→](https://packagist.org/packages/spatie/laravel-permission) | 25k | RBAC | 95 |
| 3 | [laravel/horizon](https://packagist.org/packages/laravel/horizon) | [→](https://packagist.org/packages/laravel/horizon) | 7k | キュー監視 | 95 |
| 4 | [laravel/telescope](https://packagist.org/packages/laravel/telescope) | [→](https://packagist.org/packages/laravel/telescope) | 12k | デバッグ | 94 |
| 5 | [stancl/tenancy](https://packagist.org/packages/stancl/tenancy) | [→](https://packagist.org/packages/stancl/tenancy) | 5k | マルチテナンシー | 94 |
| 6 | [pestphp/pest](https://packagist.org/packages/pestphp/pest) | [→](https://packagist.org/packages/pestphp/pest) | 11k | テスト | 93 |
| 7 | [laravel/scout](https://packagist.org/packages/laravel/scout) | [→](https://packagist.org/packages/laravel/scout) | 13k | 検索 | 92 |
| 8 | [guzzlehttp/guzzle](https://packagist.org/packages/guzzlehttp/guzzle) | [→](https://packagist.org/packages/guzzlehttp/guzzle) | 25k | HTTPクライアント | 92 |
| 9 | [spatie/laravel-activitylog](https://packagist.org/packages/spatie/laravel-activitylog) | [→](https://packagist.org/packages/spatie/laravel-activitylog) | 10k | アクティビティログ | 90 |
| 10 | [spatie/laravel-medialibrary](https://packagist.org/packages/spatie/laravel-medialibrary) | [→](https://packagist.org/packages/spatie/laravel-medialibrary) | 10k | メディア | 90 |
| 11 | [laravel/sanctum](https://packagist.org/packages/laravel/sanctum) | [→](https://packagist.org/packages/laravel/sanctum) | 8k | SPA認証 | 90 |
| 12 | [spatie/laravel-backup](https://packagist.org/packages/spatie/laravel-backup) | [→](https://packagist.org/packages/spatie/laravel-backup) | 12k | バックアップ | 88 |
| 13 | [barryvdh/laravel-dompdf](https://packagist.org/packages/barryvdh/laravel-dompdf) | [→](https://packagist.org/packages/barryvdh/laravel-dompdf) | 12k | PDF | 88 |
| 14 | [maatwebsite/excel](https://packagist.org/packages/maatwebsite/excel) | [→](https://packagist.org/packages/maatwebsite/excel) | 13k | Excel | 88 |
| 15 | [tymon/jwt-auth](https://packagist.org/packages/tymon/jwt-auth) | [→](https://packagist.org/packages/tymon/jwt-auth) | 13k | JWT | 88 |
| 16 | [socialiteproviders/manager](https://packagist.org/packages/socialiteproviders/manager) | [→](https://packagist.org/packages/socialiteproviders/manager) | 10k | ソーシャルOAuth | 88 |
| 17 | [laravel/cashier](https://packagist.org/packages/laravel/cashier) | [→](https://packagist.org/packages/laravel/cashier) | 9k | Stripe請求 | 90 |
| 18 | [predis/predis](https://packagist.org/packages/predis/predis) | [→](https://packagist.org/packages/predis/predis) | 12k | Redis | 85 |
| 19 | [laravel/breeze](https://packagist.org/packages/laravel/breeze) | [→](https://packagist.org/packages/laravel/breeze) | 10k | 認証スターター | 85 |
| 20 | [yansongda/pay](https://packagist.org/packages/yansongda/pay) | [→](https://packagist.org/packages/yansongda/pay) | 6k | Alipay/WeChat Pay | 88 |

> `php scripts/search.php top 20` を実行すると、リアルタイムの Packagist データによるランキングを取得できます。

---

## スコア計算

パッケージはリアルタイムで 0-100 のスコアが付けられます：

| 基準 | 加重 | データソース |
|------|------|------------|
| GitHub スター数 | 15% | Packagist (github_stars) |
| Packagist ダウンロード数 | 20% | Packagist API |
| お気に入り数 | 10% | Packagist (favers) |
| アクティビティ（≤30日=100） | 30% | 最終コミット日 |
| Laravel 互換性 | 15% | composer.json |
| 説明の質 | 10% | 空でない = 100 |

---

## インストール

```bash
# ClawHub CLI でインストール
clawhub install laravel-package-search

# または GitHub からダウンロード
git clone https://github.com/relunctance/laravel-package-search.git
cd laravel-package-search

# CLI を実行
php scripts/search.php scenes
php scripts/search.php search auth 3
php scripts/search.php recommend "I need WeChat Pay for Laravel 11"
```

---

## ファイル構造

```
laravel-package-search/
├── SKILL.md                      # Skill 仕様
├── README.md                     # 英語版
├── README.zh-CN.md              # 中国語簡体字版
├── README.zh-TW.md              # 中国語繁体字版
├── README.ja.md                 # 日本語版
├── references/
│   ├── top20-packages.md        # 詳細付き Top 20 完全版
│   └── scene-index.md           # Packagistリンク付き全22シーン
└── scripts/
    └── search.php               # リアルタイム Packagist CLI
```

---

## laravel-docs-reader 連携

この Skill は [laravel-docs-reader](https://clawhub.com/laravel-docs-reader) を使用して Laravel 公式ドキュメントを相互参照します：

```
✅ spatie/laravel-permission → 認可ドキュメント
✅ laravel/scout → データベース検索ドキュメント
✅ laravel/horizon → キュードキュメント
✅ laravel/sanctum → SPA 認証ドキュメント
✅ filament/filament → filamentphp.com/docs
...
```

---

## コントリビュート

欠落しているパッケージや古くなった情報を見つけましたか？
- 🐛 [Issue を開く](https://github.com/relunctance/laravel-package-search/issues)
- 🔧 [PR を送信](https://github.com/relunctance/laravel-package-search/pulls)

---

## ライセンス

MIT License | [GitHub](https://github.com/relunctance/laravel-package-search) | [ClawHub](https://clawhub.com/laravel-package-search)
