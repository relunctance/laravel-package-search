# Laravel Package Search

**English** | [中文](README.zh-CN.md) | [繁體中文](README.zh-TW.md) | [日本語](README.ja.md) | [한국어](README.ko.md) | [Français](README.fr.md) | [Español](README.es.md) | [Deutsch](README.de.md) | [Italiano](README.it.md) | [Русский](README.ru.md) | [Português (Brasil)](README.pt-BR.md)

---

## Présentation

**Laravel Package Search** est un Agent Skill OpenClaw qui aide les développeurs à trouver, évaluer et recommander rapidement des packages Laravel de haute qualité.

[![Packagist](https://img.shields.io/packagist/v/laravel/framework?style=flat-square)](https://packagist.org/packages/laravel/framework)
[![Stars](https://img.shields.io/github/stars/relunctance/laravel-package-search?style=flat-square)](https://github.com/relunctance/laravel-package-search)
[![ClawHub](https://img.shields.io/badge/ClawHub-laravel--package--search-6C43E5?style=flat-square)](https://clawhub.com/laravel-package-search)

---

## Fonctionnalités

- 🔍 **API Packagist en temps réel** — données toujours fraîches, à chaque requête
- 🗄️ **Cache local (TTL 1h)** — requêtes répétées rapides
- 🤖 **Détection intelligente de scène** — trouvez des packages par scénario métier (auth, paiement, IA, etc.)
- 📊 **Score de qualité** — étoiles × téléchargements × activité × compatibilité
- 📖 **Références croisées docs Laravel** — liens automatiques vers la documentation officielle (via [laravel-docs-reader](https://clawhub.com/laravel-docs-reader))
- 📦 **Commandes d'installation directes** — `composer require` prêt à copier

---

## Démarrage rapide

```
Vous : "J'ai besoin d'un package de permissions pour Laravel 11"
Bot : → Scène détectée : auth
     → Recherche Packagist en direct : laravel+auth
     → Renvoie les packages classés avec commandes d'installation + liens Packagist
```

---

## Outil CLI

```bash
php scripts/search.php search <scène> [limite]    # Rechercher par scène (auth, payment, ai...)
php scripts/search.php compare <pkg1> <pkg2>       # Comparer deux packages
php scripts/search.php recommend <exigence>       # Recommandation en langage naturel
php scripts/search.php top [limite]               # Top N packages (défaut 10)
php scripts/search.php scenes                    # Lister les 22 scènes
```

---

## Scènes supportées (22)

| Code | Scène | Recherche Packagist | Package principal |
|------|-------|--------------------|--------------------|
| `auth` | Authentification & Autorisation | [→](https://packagist.org/search?q=laravel+auth) | [spatie/laravel-permission](https://packagist.org/packages/spatie/laravel-permission) |
| `payment` | Paiement & Facturation | [→](https://packagist.org/search?q=laravel+payment) | [yansongda/pay](https://packagist.org/packages/yansongda/pay) |
| `search` | Recherche full-text | [→](https://packagist.org/search?q=laravel+search+scout) | [laravel/scout](https://packagist.org/packages/laravel/scout) |
| `admin` | Panneau d'administration | [→](https://packagist.org/search?q=laravel+admin+filament) | [filament/filament](https://packagist.org/packages/filament/filament) |
| `queue` | Queue & Jobs | [→](https://packagist.org/search?q=laravel+queue+horizon) | [laravel/horizon](https://packagist.org/packages/laravel/horizon) |
| `excel` | Import/Export Excel | [→](https://packagist.org/search?q=laravel+excel) | [maatwebsite/excel](https://packagist.org/packages/maatwebsite/excel) |
| `media` | Médias & Fichiers | [→](https://packagist.org/search?q=laravel+media) | [spatie/laravel-medialibrary](https://packagist.org/packages/spatie/laravel-medialibrary) |
| `wechat` | WeChat / Mini Programme | [→](https://packagist.org/search?q=laravel+wechat) | [overtrue/laravel-wechat](https://packagist.org/packages/overtrue/laravel-wechat) |
| `multitenancy` | SaaS Multi-tenant | [→](https://packagist.org/search?q=laravel+multi-tenant) | [stancl/tenancy](https://packagist.org/packages/stancl/tenancy) |
| `ai` | Intégration AI / LLM | [→](https://packagist.org/search?q=laravel+openai+llm) | [openai-php/laravel](https://packagist.org/packages/openai-php/laravel) |
| `ratelimit` | Limitation de débit | [→](https://packagist.org/search?q=laravel+rate+limit) | Intégré à Laravel |
| `stripe` | Paiements Stripe | [→](https://packagist.org/search?q=laravel+stripe) | [laravel/cashier](https://packagist.org/packages/laravel/cashier) |
| `sms` | Notifications SMS | [→](https://packagist.org/search?q=laravel+sms) | [laravel/twilio](https://packagist.org/packages/laravel/twilio-notification-channel) |
| `logging` | Journalisation & Audit | [→](https://packagist.org/search?q=laravel+log+activity) | [spatie/laravel-activitylog](https://packagist.org/packages/spatie/laravel-activitylog) |
| `api` | API & HTTP | [→](https://packagist.org/search?q=laravel+api) | [laravel/sanctum](https://packagist.org/packages/laravel/sanctum) |
| `testing` | Tests | [→](https://packagist.org/search?q=laravel+testing+pest) | [pestphp/pest](https://packagist.org/packages/pestphp/pest) |
| `cache` | Cache | [→](https://packagist.org/search?q=laravel+redis+cache) | [predis/predis](https://packagist.org/packages/predis/predis) |
| `email` | Email & Notifications | [→](https://packagist.org/search?q=laravel+mail) | [laravel/mail](https://packagist.org/packages/laravel/mail) |
| `storage` | Stockage cloud | [→](https://packagist.org/search?q=laravel+storage+s3) | [league/flysystem-aws-s3-v3](https://packagist.org/packages/league/flysystem-aws-s3-v3) |
| `security` | Sécurité | [→](https://packagist.org/search?q=laravel+security) | Intégré à Laravel |
| `ui` | UI Frontend | [→](https://packagist.org/search?q=laravel+ui+vue) | [laravel/breeze](https://packagist.org/packages/laravel/breeze) |
| `devtools` | Outils développeur | [→](https://packagist.org/search?q=laravel+debug+telescope) | [laravel/telescope](https://packagist.org/packages/laravel/telescope) |

---

## Top 20 Packages

| Rang | Package | Packagist | Étoiles | Cas d'usage | Score |
|------|---------|-----------|---------|-------------|-------|
| 1 | [filament/filament](https://packagist.org/packages/filament/filament) | [→](https://packagist.org/packages/filament/filament) | 25k | Panneau admin | 96 |
| 2 | [spatie/laravel-permission](https://packagist.org/packages/spatie/laravel-permission) | [→](https://packagist.org/packages/spatie/laravel-permission) | 25k | RBAC | 95 |
| 3 | [laravel/horizon](https://packagist.org/packages/laravel/horizon) | [→](https://packagist.org/packages/laravel/horizon) | 7k | Monitoring file d'attente | 95 |
| 4 | [laravel/telescope](https://packagist.org/packages/laravel/telescope) | [→](https://packagist.org/packages/laravel/telescope) | 12k | Débogage | 94 |
| 5 | [stancl/tenancy](https://packagist.org/packages/stancl/tenancy) | [→](https://packagist.org/packages/stancl/tenancy) | 5k | Multi-tenant | 94 |
| 6 | [pestphp/pest](https://packagist.org/packages/pestphp/pest) | [→](https://packagist.org/packages/pestphp/pest) | 11k | Tests | 93 |
| 7 | [laravel/scout](https://packagist.org/packages/laravel/scout) | [→](https://packagist.org/packages/laravel/scout) | 13k | Recherche | 92 |
| 8 | [guzzlehttp/guzzle](https://packagist.org/packages/guzzlehttp/guzzle) | [→](https://packagist.org/packages/guzzlehttp/guzzle) | 25k | Client HTTP | 92 |
| 9 | [spatie/laravel-activitylog](https://packagist.org/packages/spatie/laravel-activitylog) | [→](https://packagist.org/packages/spatie/laravel-activitylog) | 10k | Journal d'activité | 90 |
| 10 | [spatie/laravel-medialibrary](https://packagist.org/packages/spatie/laravel-medialibrary) | [→](https://packagist.org/packages/spatie/laravel-medialibrary) | 10k | Médias | 90 |
| 11 | [laravel/sanctum](https://packagist.org/packages/laravel/sanctum) | [→](https://packagist.org/packages/laravel/sanctum) | 8k | Auth SPA | 90 |
| 12 | [spatie/laravel-backup](https://packagist.org/packages/spatie/laravel-backup) | [→](https://packagist.org/packages/spatie/laravel-backup) | 12k | Sauvegarde | 88 |
| 13 | [barryvdh/laravel-dompdf](https://packagist.org/packages/barryvdh/laravel-dompdf) | [→](https://packagist.org/packages/barryvdh/laravel-dompdf) | 12k | PDF | 88 |
| 14 | [maatwebsite/excel](https://packagist.org/packages/maatwebsite/excel) | [→](https://packagist.org/packages/maatwebsite/excel) | 13k | Excel | 88 |
| 15 | [tymon/jwt-auth](https://packagist.org/packages/tymon/jwt-auth) | [→](https://packagist.org/packages/tymon/jwt-auth) | 13k | JWT | 88 |
| 16 | [socialiteproviders/manager](https://packagist.org/packages/socialiteproviders/manager) | [→](https://packagist.org/packages/socialiteproviders/manager) | 10k | OAuth social | 88 |
| 17 | [laravel/cashier](https://packagist.org/packages/laravel/cashier) | [→](https://packagist.org/packages/laravel/cashier) | 9k | Facturation Stripe | 90 |
| 18 | [predis/predis](https://packagist.org/packages/predis/predis) | [→](https://packagist.org/packages/predis/predis) | 12k | Redis | 85 |
| 19 | [laravel/breeze](https://packagist.org/packages/laravel/breeze) | [→](https://packagist.org/packages/laravel/breeze) | 10k | Auth starter | 85 |
| 20 | [yansongda/pay](https://packagist.org/packages/yansongda/pay) | [→](https://packagist.org/packages/yansongda/pay) | 6k | Alipay/WeChat Pay | 88 |

> Exécutez `php scripts/search.php top 20` pour obtenir les classements **en temps réel** avec les données Packagist réelles.

---

## Système de score

Les packages sont notés 0-100 en temps réel :

| Critère | Pondération | Source |
|---------|------------|--------|
| Étoiles GitHub | 15% | Packagist (github_stars) |
| Téléchargements Packagist | 20% | API Packagist |
| Favoris | 10% | Packagist (favers) |
| Activité (≤30j=100) | 30% | Dernier commit |
| Compatibilité Laravel | 15% | composer.json |
| Qualité de la description | 10% | Non vide = 100 |

---

## Installation

```bash
# Installation via ClawHub CLI
clawhub install laravel-package-search

# Ou télécharger depuis GitHub
git clone https://github.com/relunctance/laravel-package-search.git
cd laravel-package-search

# Exécuter le CLI
php scripts/search.php scenes
php scripts/search.php search auth 3
php scripts/search.php recommend "I need WeChat Pay for Laravel 11"
```

---

## Structure des fichiers

```
laravel-package-search/
├── SKILL.md                      # Spécification du Skill
├── README.md                     # Version anglaise
├── README.zh-CN.md              # Version chinoise simplifié
├── README.zh-TW.md              # Version chinoise traditionnel
├── README.ja.md                 # Version japonaise
├── README.ko.md                 # Version coréenne
├── README.fr.md                 # Version française
├── references/
│   ├── top20-packages.md        # Top 20 complet avec détails
│   └── scene-index.md           # 22 scènes avec liens Packagist
└── scripts/
    └── search.php               # CLI Packagist temps réel
```

---

## Intégration laravel-docs-reader

Ce skill référencie la documentation Laravel officielle via [laravel-docs-reader](https://clawhub.com/laravel-docs-reader) :

```
✅ spatie/laravel-permission → docs Autorisation
✅ laravel/scout → docs Recherche en base de données
✅ laravel/horizon → docs Queues
✅ laravel/sanctum → docs Authentification SPA
✅ filament/filament → filamentphp.com/docs
...
```

---

## Contribution

Vous avez trouvé un package manquant ou des infos obsolètes ?
- 🐛 [Ouvrir une Issue](https://github.com/relunctance/laravel-package-search/issues)
- 🔧 [Soumettre une PR](https://github.com/relunctance/laravel-package-search/pulls)

---

## Licence

MIT License | [GitHub](https://github.com/relunctance/laravel-package-search) | [ClawHub](https://clawhub.com/laravel-package-search)
