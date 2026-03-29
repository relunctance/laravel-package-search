# Laravel Package Search

**English** | [中文](README.zh-CN.md) | [繁體中文](README.zh-TW.md) | [日本語](README.ja.md) | [한국어](README.ko.md) | [Français](README.fr.md) | [Español](README.es.md) | [Deutsch](README.de.md) | [Italiano](README.it.md) | [Русский](README.ru.md) | [Português (Brasil)](README.pt-BR.md)

---

## Panoramica

**Laravel Package Search** è un Agent Skill di OpenClaw che aiuta gli sviluppatori a trovare, valutare e consigliare rapidamente pacchetti di alta qualità nell'ecosistema Laravel.

[![Packagist](https://img.shields.io/packagist/v/laravel/framework?style=flat-square)](https://packagist.org/packages/laravel/framework)
[![Stars](https://img.shields.io/github/stars/relunctance/laravel-package-search?style=flat-square)](https://github.com/relunctance/laravel-package-search)
[![ClawHub](https://img.shields.io/badge/ClawHub-laravel--package--search-6C43E5?style=flat-square)](https://clawhub.com/laravel-package-search)

---

## Funzionalità

- 🔍 **API Packagist in tempo reale** — dati sempre freschi ad ogni query
- 🗄️ **Cache locale (TTL 1h)** — query ripetute veloci
- 🤖 **Rilevamento intelligente della scena** — trova pacchetti per scenario di business (auth, pagamento, AI, ecc.)
- 📊 **Punteggio di qualità** — stelle × download × attività × compatibilità
- 📖 **Riferimenti incrociati docs Laravel** — link automatici alla documentazione ufficiale (via [laravel-docs-reader](https://clawhub.com/laravel-docs-reader))
- 📦 **Comandi di installazione diretti** — `composer require` pronto da copiare

---

## Avvio rapido

```
Tu: "Ho bisogno di un pacchetto di permessi per Laravel 11"
Bot: → Scena rilevata: auth
     → Ricerca Packagist live: laravel+auth
     → Restituisce pacchetti classificati con comandi di installazione + link Packagist
```

---

## Strumento CLI

```bash
php scripts/search.php search <scena> [limite]     # Cerca per scena (auth, payment, ai...)
php scripts/search.php compare <pkg1> <pkg2>        # Confronta due pacchetti
php scripts/search.php recommend <requisito>          # Raccomandazione in linguaggio naturale
php scripts/search.php top [limite]                 # Top N pacchetti (default 10)
php scripts/search.php scenes                       # Elenca tutte le 22 scene
```

---

## Scene supportate (22)

| Codice | Scena | Ricerca Packagist | Pacchetto principale |
|--------|-------|-------------------|----------------------|
| `auth` | Autenticazione e Autorizzazione | [→](https://packagist.org/search?q=laravel+auth) | [spatie/laravel-permission](https://packagist.org/packages/spatie/laravel-permission) |
| `payment` | Pagamento e Fatturazione | [→](https://packagist.org/search?q=laravel+payment) | [yansongda/pay](https://packagist.org/packages/yansongda/pay) |
| `search` | Ricerca full-text | [→](https://packagist.org/search?q=laravel+search+scout) | [laravel/scout](https://packagist.org/packages/laravel/scout) |
| `admin` | Pannello di amministrazione | [→](https://packagist.org/search?q=laravel+admin+filament) | [filament/filament](https://packagist.org/packages/filament/filament) |
| `queue` | Code e Job | [→](https://packagist.org/search?q=laravel+queue+horizon) | [laravel/horizon](https://packagist.org/packages/laravel/horizon) |
| `excel` | Import/Export Excel | [→](https://packagist.org/search?q=laravel+excel) | [maatwebsite/excel](https://packagist.org/packages/maatwebsite/excel) |
| `media` | Media e File | [→](https://packagist.org/search?q=laravel+media) | [spatie/laravel-medialibrary](https://packagist.org/packages/spatie/laravel-medialibrary) |
| `wechat` | WeChat / Mini Program | [→](https://packagist.org/search?q=laravel+wechat) | [overtrue/laravel-wechat](https://packagist.org/packages/overtrue/laravel-wechat) |
| `multitenancy` | SaaS Multi-tenant | [→](https://packagist.org/search?q=laravel+multi-tenant) | [stancl/tenancy](https://packagist.org/packages/stancl/tenancy) |
| `ai` | Integrazione AI / LLM | [→](https://packagist.org/search?q=laravel+openai+llm) | [openai-php/laravel](https://packagist.org/packages/openai-php/laravel) |
| `ratelimit` | Rate Limiting | [→](https://packagist.org/search?q=laravel+rate+limit) | Integrato in Laravel |
| `stripe` | Pagamenti Stripe | [→](https://packagist.org/search?q=laravel+stripe) | [laravel/cashier](https://packagist.org/packages/laravel/cashier) |
| `sms` | Notifiche SMS | [→](https://packagist.org/search?q=laravel+sms) | [laravel/twilio](https://packagist.org/packages/laravel/twilio-notification-channel) |
| `logging` | Logging e Audit | [→](https://packagist.org/search?q=laravel+log+activity) | [spatie/laravel-activitylog](https://packagist.org/packages/spatie/laravel-activitylog) |
| `api` | API e HTTP | [→](https://packagist.org/search?q=laravel+api) | [laravel/sanctum](https://packagist.org/packages/laravel/sanctum) |
| `testing` | Testing | [→](https://packagist.org/search?q=laravel+testing+pest) | [pestphp/pest](https://packagist.org/packages/pestphp/pest) |
| `cache` | Caching | [→](https://packagist.org/search?q=laravel+redis+cache) | [predis/predis](https://packagist.org/packages/predis/predis) |
| `email` | Email e Notifiche | [→](https://packagist.org/search?q=laravel+mail) | [laravel/mail](https://packagist.org/packages/laravel/mail) |
| `storage` | Archiviazione cloud | [→](https://packagist.org/search?q=laravel+storage+s3) | [league/flysystem-aws-s3-v3](https://packagist.org/packages/league/flysystem-aws-s3-v3) |
| `security` | Sicurezza | [→](https://packagist.org/search?q=laravel+security) | Integrato in Laravel |
| `ui` | UI Frontend | [→](https://packagist.org/search?q=laravel+ui+vue) | [laravel/breeze](https://packagist.org/packages/laravel/breeze) |
| `devtools` | Strumenti di sviluppo | [→](https://packagist.org/search?q=laravel+debug+telescope) | [laravel/telescope](https://packagist.org/packages/laravel/telescope) |

---

## Top 20 Pacchetti

| Rank | Pacchetto | Packagist | Stelle | Caso d'uso | Punteggio |
|------|-----------|-----------|--------|------------|-----------|
| 1 | [filament/filament](https://packagist.org/packages/filament/filament) | [→](https://packagist.org/packages/filament/filament) | 25k | Pannello admin | 96 |
| 2 | [spatie/laravel-permission](https://packagist.org/packages/spatie/laravel-permission) | [→](https://packagist.org/packages/spatie/laravel-permission) | 25k | RBAC | 95 |
| 3 | [laravel/horizon](https://packagist.org/packages/laravel/horizon) | [→](https://packagist.org/packages/laravel/horizon) | 7k | Monitoraggio code | 95 |
| 4 | [laravel/telescope](https://packagist.org/packages/laravel/telescope) | [→](https://packagist.org/packages/laravel/telescope) | 12k | Debugging | 94 |
| 5 | [stancl/tenancy](https://packagist.org/packages/stancl/tenancy) | [→](https://packagist.org/packages/stancl/tenancy) | 5k | Multi-tenant | 94 |
| 6 | [pestphp/pest](https://packagist.org/packages/pestphp/pest) | [→](https://packagist.org/packages/pestphp/pest) | 11k | Testing | 93 |
| 7 | [laravel/scout](https://packagist.org/packages/laravel/scout) | [→](https://packagist.org/packages/laravel/scout) | 13k | Ricerca | 92 |
| 8 | [guzzlehttp/guzzle](https://packagist.org/packages/guzzlehttp/guzzle) | [→](https://packagist.org/packages/guzzlehttp/guzzle) | 25k | HTTP Client | 92 |
| 9 | [spatie/laravel-activitylog](https://packagist.org/packages/spatie/laravel-activitylog) | [→](https://packagist.org/packages/spatie/laravel-activitylog) | 10k | Log attività | 90 |
| 10 | [spatie/laravel-medialibrary](https://packagist.org/packages/spatie/laravel-medialibrary) | [→](https://packagist.org/packages/spatie/laravel-medialibrary) | 10k | Media | 90 |
| 11 | [laravel/sanctum](https://packagist.org/packages/laravel/sanctum) | [→](https://packagist.org/packages/laravel/sanctum) | 8k | Auth SPA | 90 |
| 12 | [spatie/laravel-backup](https://packagist.org/packages/spatie/laravel-backup) | [→](https://packagist.org/packages/spatie/laravel-backup) | 12k | Backup | 88 |
| 13 | [barryvdh/laravel-dompdf](https://packagist.org/packages/barryvdh/laravel-dompdf) | [→](https://packagist.org/packages/barryvdh/laravel-dompdf) | 12k | PDF | 88 |
| 14 | [maatwebsite/excel](https://packagist.org/packages/maatwebsite/excel) | [→](https://packagist.org/packages/maatwebsite/excel) | 13k | Excel | 88 |
| 15 | [tymon/jwt-auth](https://packagist.org/packages/tymon/jwt-auth) | [→](https://packagist.org/packages/tymon/jwt-auth) | 13k | JWT | 88 |
| 16 | [socialiteproviders/manager](https://packagist.org/packages/socialiteproviders/manager) | [→](https://packagist.org/packages/socialiteproviders/manager) | 10k | OAuth social | 88 |
| 17 | [laravel/cashier](https://packagist.org/packages/laravel/cashier) | [→](https://packagist.org/packages/laravel/cashier) | 9k | Fatturazione Stripe | 90 |
| 18 | [predis/predis](https://packagist.org/packages/predis/predis) | [→](https://packagist.org/packages/predis/predis) | 12k | Redis | 85 |
| 19 | [laravel/breeze](https://packagist.org/packages/laravel/breeze) | [→](https://packagist.org/packages/laravel/breeze) | 10k | Auth starter | 85 |
| 20 | [yansongda/pay](https://packagist.org/packages/yansongda/pay) | [→](https://packagist.org/packages/yansongda/pay) | 6k | Alipay/WeChat Pay | 88 |

> Esegui `php scripts/search.php top 20` per le classifiche **in tempo reale** con dati reali Packagist.

---

## Sistema di punteggio

I pacchetti vengono valutati in tempo reale da 0-100:

| Criterio | Peso | Fonte |
|----------|------|-------|
| Stelle GitHub | 15% | Packagist (github_stars) |
| Download Packagist | 20% | API Packagist |
| Preferiti | 10% | Packagist (favers) |
| Attività (≤30gg=100) | 30% | Ultimo commit |
| Compatibilità Laravel | 15% | composer.json |
| Qualità della descrizione | 10% | Non vuoto = 100 |

---

## Installazione

```bash
# Installa tramite ClawHub CLI
clawhub install laravel-package-search

# Oppure scarica da GitHub
git clone https://github.com/relunctance/laravel-package-search.git
cd laravel-package-search

# Esegui CLI
php scripts/search.php scenes
php scripts/search.php search auth 3
php scripts/search.php recommend "I need WeChat Pay for Laravel 11"
```

---

## Struttura dei file

```
laravel-package-search/
├── SKILL.md                      # Specifica Skill
├── README.md                     # Versione inglese
├── README.zh-CN.md              # Versione cinese semplificato
├── README.zh-TW.md              # Versione cinese tradizionale
├── README.ja.md                 # Versione giapponese
├── README.ko.md                 # Versione coreana
├── README.fr.md                 # Versione francese
├── README.es.md                 # Versione spagnola
├── README.de.md                 # Versione tedesca
├── README.it.md                 # Versione italiana
├── references/
│   ├── top20-packages.md        # Top 20 completo con dettagli
│   └── scene-index.md           # 22 scene con link Packagist
└── scripts/
    └── search.php               # CLI Packagist in tempo reale
```

---

## Integrazione laravel-docs-reader

Questo skill referenzia la documentazione ufficiale Laravel tramite [laravel-docs-reader](https://clawhub.com/laravel-docs-reader):

```
✅ spatie/laravel-permission → docs Autorizzazione
✅ laravel/scout → docs Ricerca database
✅ laravel/horizon → docs Code
✅ laravel/sanctum → docs Auth SPA
✅ filament/filament → filamentphp.com/docs
...
```

---

## Contributi

Trovato un pacchetto mancante o informazioni obsolete?
- 🐛 [Apri una Issue](https://github.com/relunctance/laravel-package-search/issues)
- 🔧 [Invia una PR](https://github.com/relunctance/laravel-package-search/pulls)

---

## Licenza

MIT License | [GitHub](https://github.com/relunctance/laravel-package-search) | [ClawHub](https://clawhub.com/laravel-package-search)
