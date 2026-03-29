# Laravel Package Search

**English** | [中文](README.zh-CN.md) | [繁體中文](README.zh-TW.md) | [日本語](README.ja.md) | [한국어](README.ko.md) | [Français](README.fr.md) | [Español](README.es.md) | [Deutsch](README.de.md) | [Italiano](README.it.md) | [Русский](README.ru.md) | [Português (Brasil)](README.pt-BR.md)

---

## Überblick

**Laravel Package Search** ist ein OpenClaw Agent Skill, der Entwicklern hilft, schnell qualitativ hochwertige Pakete im Laravel-Ökosystem zu finden, zu bewerten und zu empfehlen.

[![Packagist](https://img.shields.io/packagist/v/laravel/framework?style=flat-square)](https://packagist.org/packages/laravel/framework)
[![Stars](https://img.shields.io/github/stars/relunctance/laravel-package-search?style=flat-square)](https://github.com/relunctance/laravel-package-search)
[![ClawHub](https://img.shields.io/badge/ClawHub-laravel--package--search-6C43E5?style=flat-square)](https://clawhub.com/laravel-package-search)

---

## Funktionen

- 🔍 **Echtzeit-Packagist-API** — Daten sind bei jeder Abfrage aktuell
- 🗄️ **Lokaler Cache (1h TTL)** — Schnelle Wiederholungsabfragen
- 🤖 **Intelligente Szenenerkennung** — Pakete nach Geschäftsszenario finden (Auth, Zahlung, KI usw.)
- 📊 **Qualitätsbewertung** — Sterne × Downloads × Aktivität × Kompatibilität
- 📖 **Laravel-Dokumentation Querverweise** — Automatische Links zur offiziellen Dokumentation (via [laravel-docs-reader](https://clawhub.com/laravel-docs-reader))
- 📦 **Direkte Installationsbefehle** — `composer require` zum Kopieren bereit

---

## Schnellstart

```
Du: „Ich brauche ein Berechtigungspaket für Laravel 11"
Bot: → Szenario erkannt: auth
     → Live-Packagist-Suche: laravel+auth
     → Gibt gerankte Pakete mit Installationsbefehlen + Packagist-Links zurück
```

---

## CLI-Tool

```bash
php scripts/search.php search <szenario> [limit]     # Nach Szenario suchen (auth, payment, ai...)
php scripts/search.php compare <pkg1> <pkg2>          # Zwei Pakete vergleichen
php scripts/search.php recommend <anforderung>         # Natürlichsprachliche Empfehlung
php scripts/search.php top [limit]                    # Top N Pakete (Standard 10)
php scripts/search.php scenes                         # Alle 22 Szenarien auflisten
```

---

## Unterstützte Szenarien (22)

| Code | Szenario | Packagist-Suche | Top-Paket |
|------|---------|-----------------|-----------|
| `auth` | Authentifizierung & Autorisierung | [→](https://packagist.org/search?q=laravel+auth) | [spatie/laravel-permission](https://packagist.org/packages/spatie/laravel-permission) |
| `payment` | Zahlung & Abrechnung | [→](https://packagist.org/search?q=laravel+payment) | [yansongda/pay](https://packagist.org/packages/yansongda/pay) |
| `search` | Volltextsuche | [→](https://packagist.org/search?q=laravel+search+scout) | [laravel/scout](https://packagist.org/packages/laravel/scout) |
| `admin` | Admin-Panel | [→](https://packagist.org/search?q=laravel+admin+filament) | [filament/filament](https://packagist.org/packages/filament/filament) |
| `queue` | Queue & Jobs | [→](https://packagist.org/search?q=laravel+queue+horizon) | [laravel/horizon](https://packagist.org/packages/laravel/horizon) |
| `excel` | Excel-Import/Export | [→](https://packagist.org/search?q=laravel+excel) | [maatwebsite/excel](https://packagist.org/packages/maatwebsite/excel) |
| `media` | Medien & Dateien | [→](https://packagist.org/search?q=laravel+media) | [spatie/laravel-medialibrary](https://packagist.org/packages/spatie/laravel-medialibrary) |
| `wechat` | WeChat / Mini-Programm | [→](https://packagist.org/search?q=laravel+wechat) | [overtrue/laravel-wechat](https://packagist.org/packages/overtrue/laravel-wechat) |
| `multitenancy` | Multi-Tenant SaaS | [→](https://packagist.org/search?q=laravel+multi-tenant) | [stancl/tenancy](https://packagist.org/packages/stancl/tenancy) |
| `ai` | KI / LLM-Integration | [→](https://packagist.org/search?q=laravel+openai+llm) | [openai-php/laravel](https://packagist.org/packages/openai-php/laravel) |
| `ratelimit` | Rate-Limiting | [→](https://packagist.org/search?q=laravel+rate+limit) | In Laravel eingebaut |
| `stripe` | Stripe-Zahlungen | [→](https://packagist.org/search?q=laravel+stripe) | [laravel/cashier](https://packagist.org/packages/laravel/cashier) |
| `sms` | SMS-Benachrichtigungen | [→](https://packagist.org/search?q=laravel+sms) | [laravel/twilio](https://packagist.org/packages/laravel/twilio-notification-channel) |
| `logging` | Logging & Audit | [→](https://packagist.org/search?q=laravel+log+activity) | [spatie/laravel-activitylog](https://packagist.org/packages/spatie/laravel-activitylog) |
| `api` | API & HTTP | [→](https://packagist.org/search?q=laravel+api) | [laravel/sanctum](https://packagist.org/packages/laravel/sanctum) |
| `testing` | Testing | [→](https://packagist.org/search?q=laravel+testing+pest) | [pestphp/pest](https://packagist.org/packages/pestphp/pest) |
| `cache` | Caching | [→](https://packagist.org/search?q=laravel+redis+cache) | [predis/predis](https://packagist.org/packages/predis/predis) |
| `email` | E-Mail & Benachrichtigungen | [→](https://packagist.org/search?q=laravel+mail) | [laravel/mail](https://packagist.org/packages/laravel/mail) |
| `storage` | Cloud-Speicher | [→](https://packagist.org/search?q=laravel+storage+s3) | [league/flysystem-aws-s3-v3](https://packagist.org/packages/league/flysystem-aws-s3-v3) |
| `security` | Sicherheit | [→](https://packagist.org/search?q=laravel+security) | In Laravel eingebaut |
| `ui` | Frontend-UI | [→](https://packagist.org/search?q=laravel+ui+vue) | [laravel/breeze](https://packagist.org/packages/laravel/breeze) |
| `devtools` | Entwicklertools | [→](https://packagist.org/search?q=laravel+debug+telescope) | [laravel/telescope](https://packagist.org/packages/laravel/telescope) |

---

## Top 20 Pakete

| Rang | Paket | Packagist | Sterne | Anwendungsfall | Punkte |
|------|-------|-----------|--------|----------------|--------|
| 1 | [filament/filament](https://packagist.org/packages/filament/filament) | [→](https://packagist.org/packages/filament/filament) | 25k | Admin-Panel | 96 |
| 2 | [spatie/laravel-permission](https://packagist.org/packages/spatie/laravel-permission) | [→](https://packagist.org/packages/spatie/laravel-permission) | 25k | RBAC | 95 |
| 3 | [laravel/horizon](https://packagist.org/packages/laravel/horizon) | [→](https://packagist.org/packages/laravel/horizon) | 7k | Queue-Überwachung | 95 |
| 4 | [laravel/telescope](https://packagist.org/packages/laravel/telescope) | [→](https://packagist.org/packages/laravel/telescope) | 12k | Debugging | 94 |
| 5 | [stancl/tenancy](https://packagist.org/packages/stancl/tenancy) | [→](https://packagist.org/packages/stancl/tenancy) | 5k | Multi-Tenant | 94 |
| 6 | [pestphp/pest](https://packagist.org/packages/pestphp/pest) | [→](https://packagist.org/packages/pestphp/pest) | 11k | Testing | 93 |
| 7 | [laravel/scout](https://packagist.org/packages/laravel/scout) | [→](https://packagist.org/packages/laravel/scout) | 13k | Suche | 92 |
| 8 | [guzzlehttp/guzzle](https://packagist.org/packages/guzzlehttp/guzzle) | [→](https://packagist.org/packages/guzzlehttp/guzzle) | 25k | HTTP-Client | 92 |
| 9 | [spatie/laravel-activitylog](https://packagist.org/packages/spatie/laravel-activitylog) | [→](https://packagist.org/packages/spatie/laravel-activitylog) | 10k | Aktivitätsprotokoll | 90 |
| 10 | [spatie/laravel-medialibrary](https://packagist.org/packages/spatie/laravel-medialibrary) | [→](https://packagist.org/packages/spatie/laravel-medialibrary) | 10k | Medien | 90 |
| 11 | [laravel/sanctum](https://packagist.org/packages/laravel/sanctum) | [→](https://packagist.org/packages/laravel/sanctum) | 8k | SPA-Auth | 90 |
| 12 | [spatie/laravel-backup](https://packagist.org/packages/spatie/laravel-backup) | [→](https://packagist.org/packages/spatie/laravel-backup) | 12k | Backup | 88 |
| 13 | [barryvdh/laravel-dompdf](https://packagist.org/packages/barryvdh/laravel-dompdf) | [→](https://packagist.org/packages/barryvdh/laravel-dompdf) | 12k | PDF | 88 |
| 14 | [maatwebsite/excel](https://packagist.org/packages/maatwebsite/excel) | [→](https://packagist.org/packages/maatwebsite/excel) | 13k | Excel | 88 |
| 15 | [tymon/jwt-auth](https://packagist.org/packages/tymon/jwt-auth) | [→](https://packagist.org/packages/tymon/jwt-auth) | 13k | JWT | 88 |
| 16 | [socialiteproviders/manager](https://packagist.org/packages/socialiteproviders/manager) | [→](https://packagist.org/packages/socialiteproviders/manager) | 10k | Social OAuth | 88 |
| 17 | [laravel/cashier](https://packagist.org/packages/laravel/cashier) | [→](https://packagist.org/packages/laravel/cashier) | 9k | Stripe-Abrechnung | 90 |
| 18 | [predis/predis](https://packagist.org/packages/predis/predis) | [→](https://packagist.org/packages/predis/predis) | 12k | Redis | 85 |
| 19 | [laravel/breeze](https://packagist.org/packages/laravel/breeze) | [→](https://packagist.org/packages/laravel/breeze) | 10k | Auth-Starter | 85 |
| 20 | [yansongda/pay](https://packagist.org/packages/yansongda/pay) | [→](https://packagist.org/packages/yansongda/pay) | 6k | Alipay/WeChat Pay | 88 |

> Führe `php scripts/search.php top 20` aus für **Live**-Rankings mit echten Packagist-Daten.

---

## Bewertungssystem

Pakete werden in Echtzeit mit 0-100 bewertet:

| Kriterium | Gewichtung | Quelle |
|-----------|-----------|--------|
| GitHub-Sterne | 15% | Packagist (github_stars) |
| Packagist-Downloads | 20% | Packagist-API |
| Favoriten | 10% | Packagist (favers) |
| Aktivität (≤30d=100) | 30% | Letzter Commit |
| Laravel-Kompatibilität | 15% | composer.json |
| Beschreibungsqualität | 10% | Nicht leer = 100 |

---

## Installation

```bash
# Installation über ClawHub CLI
clawhub install laravel-package-search

# Oder von GitHub herunterladen
git clone https://github.com/relunctance/laravel-package-search.git
cd laravel-package-search

# CLI ausführen
php scripts/search.php scenes
php scripts/search.php search auth 3
php scripts/search.php recommend "I need WeChat Pay for Laravel 11"
```

---

## Dateistruktur

```
laravel-package-search/
├── SKILL.md                      # Skill-Spezifikation
├── README.md                     # Englische Version
├── README.zh-CN.md              # Chinesisch (vereinfacht)
├── README.zh-TW.md              # Chinesisch (traditionell)
├── README.ja.md                 # Japanische Version
├── README.ko.md                 # Koreanische Version
├── README.fr.md                 # Französische Version
├── README.es.md                 # Spanische Version
├── README.de.md                 # Deutsche Version
├── references/
│   ├── top20-packages.md        # Vollständiges Top 20 mit Details
│   └── scene-index.md           # Alle 22 Szenarien mit Packagist-Links
└── scripts/
    └── search.php               # Echtzeit-Packagist-CLI
```

---

## laravel-docs-reader-Integration

Dieser Skill verweist auf die offizielle Laravel-Dokumentation über [laravel-docs-reader](https://clawhub.com/laravel-docs-reader):

```
✅ spatie/laravel-permission → Autorisierungs-Docs
✅ laravel/scout → Datenbanksuch-Docs
✅ laravel/horizon → Queue-Docs
✅ laravel/sanctum → SPA-Authentifizierungs-Docs
✅ filament/filament → filamentphp.com/docs
...
```

---

## Beitragen

Ein fehlendes Paket oder veraltete Informationen gefunden?
- 🐛 [Issue öffnen](https://github.com/relunctance/laravel-package-search/issues)
- 🔧 [PR einreichen](https://github.com/relunctance/laravel-package-search/pulls)

---

## Lizenz

MIT License | [GitHub](https://github.com/relunctance/laravel-package-search) | [ClawHub](https://clawhub.com/laravel-package-search)
