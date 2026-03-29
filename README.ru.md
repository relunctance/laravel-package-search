# Laravel Package Search

**English** | [中文](README.zh-CN.md) | [繁體中文](README.zh-TW.md) | [日本語](README.ja.md) | [한국어](README.ko.md) | [Français](README.fr.md) | [Español](README.es.md) | [Deutsch](README.de.md) | [Italiano](README.it.md) | [Русский](README.ru.md) | [Português (Brasil)](README.pt-BR.md)

---

## Обзор

**Laravel Package Search** — это OpenClaw Agent Skill, который помогает разработчикам быстро находить, оценивать и рекомендовать качественные пакеты экосистемы Laravel.

[![Packagist](https://img.shields.io/packagist/v/laravel/framework?style=flat-square)](https://packagist.org/packages/laravel/framework)
[![Stars](https://img.shields.io/github/stars/relunctance/laravel-package-search?style=flat-square)](https://github.com/relunctance/laravel-package-search)
[![ClawHub](https://img.shields.io/badge/ClawHub-laravel--package--search-6C43E5?style=flat-square)](https://clawhub.com/laravel-package-search)

---

## Возможности

- 🔍 **API Packagist в реальном времени** — данные всегда актуальны при каждом запросе
- 🗄️ **Локальный кэш (TTL 1 час)** — быстрые повторные запросы
- 🤖 **Умное определение сценария** — находите пакеты по бизнес-сценарию (аутентификация, платежи, AI и т.д.)
- 📊 **Оценка качества** — звёзды × загрузки × активность × совместимость
- 📖 **Перекрёстные ссылки на docs Laravel** — автоматические ссылки на официальную документацию (через [laravel-docs-reader](https://clawhub.com/laravel-docs-reader))
- 📦 **Готовые команды установки** — `composer require` готов к копированию

---

## Быстрый старт

```
Вы: "Мне нужен пакет прав доступа для Laravel 11"
Bot: → Определён сценарий: auth
     → Поиск Packagist в реальном времени: laravel+auth
     → Возвращает ранжированный список пакетов с командами установки + ссылками Packagist
```

---

## CLI-инструмент

```bash
php scripts/search.php search <сценарий> [лимит]   # Поиск по сценарию (auth, payment, ai...)
php scripts/search.php compare <pkg1> <pkg2>        # Сравнить два пакета
php scripts/search.php recommend <требование>       # Рекомендация на естественном языке
php scripts/search.php top [лимит]                  # Топ N пакетов (по умолчанию 10)
php scripts/search.php scenes                       # Показать все 22 сценария
```

---

## Поддерживаемые сценарии (22)

| Код | Сценарий | Поиск в Packagist | Основной пакет |
|-----|---------|-------------------|----------------|
| `auth` | Аутентификация и авторизация | [→](https://packagist.org/search?q=laravel+auth) | [spatie/laravel-permission](https://packagist.org/packages/spatie/laravel-permission) |
| `payment` | Платежи и биллинг | [→](https://packagist.org/search?q=laravel+payment) | [yansongda/pay](https://packagist.org/packages/yansongda/pay) |
| `search` | Полнотекстовый поиск | [→](https://packagist.org/search?q=laravel+search+scout) | [laravel/scout](https://packagist.org/packages/laravel/scout) |
| `admin` | Панель администратора | [→](https://packagist.org/search?q=laravel+admin+filament) | [filament/filament](https://packagist.org/packages/filament/filament) |
| `queue` | Очереди и задачи | [→](https://packagist.org/search?q=laravel+queue+horizon) | [laravel/horizon](https://packagist.org/packages/laravel/horizon) |
| `excel` | Импорт/экспорт Excel | [→](https://packagist.org/search?q=laravel+excel) | [maatwebsite/excel](https://packagist.org/packages/maatwebsite/excel) |
| `media` | Медиа и файлы | [→](https://packagist.org/search?q=laravel+media) | [spatie/laravel-medialibrary](https://packagist.org/packages/spatie/laravel-medialibrary) |
| `wechat` | WeChat / Мини-программа | [→](https://packagist.org/search?q=laravel+wechat) | [overtrue/laravel-wechat](https://packagist.org/packages/overtrue/laravel-wechat) |
| `multitenancy` | SaaS с мультиарендностью | [→](https://packagist.org/search?q=laravel+multi-tenant) | [stancl/tenancy](https://packagist.org/packages/stancl/tenancy) |
| `ai` | Интеграция AI / LLM | [→](https://packagist.org/search?q=laravel+openai+llm) | [openai-php/laravel](https://packagist.org/packages/openai-php/laravel) |
| `ratelimit` | Ограничение частоты | [→](https://packagist.org/search?q=laravel+rate+limit) | Встроено в Laravel |
| `stripe` | Платежи Stripe | [→](https://packagist.org/search?q=laravel+stripe) | [laravel/cashier](https://packagist.org/packages/laravel/cashier) |
| `sms` | SMS-уведомления | [→](https://packagist.org/search?q=laravel+sms) | [laravel/twilio](https://packagist.org/packages/laravel/twilio-notification-channel) |
| `logging` | Логирование и аудит | [→](https://packagist.org/search?q=laravel+log+activity) | [spatie/laravel-activitylog](https://packagist.org/packages/spatie/laravel-activitylog) |
| `api` | API и HTTP | [→](https://packagist.org/search?q=laravel+api) | [laravel/sanctum](https://packagist.org/packages/laravel/sanctum) |
| `testing` | Тестирование | [→](https://packagist.org/search?q=laravel+testing+pest) | [pestphp/pest](https://packagist.org/packages/pestphp/pest) |
| `cache` | Кэширование | [→](https://packagist.org/search?q=laravel+redis+cache) | [predis/predis](https://packagist.org/packages/predis/predis) |
| `email` | Email и уведомления | [→](https://packagist.org/search?q=laravel+mail) | [laravel/mail](https://packagist.org/packages/laravel/mail) |
| `storage` | Облачное хранилище | [→](https://packagist.org/search?q=laravel+storage+s3) | [league/flysystem-aws-s3-v3](https://packagist.org/packages/league/flysystem-aws-s3-v3) |
| `security` | Безопасность | [→](https://packagist.org/search?q=laravel+security) | Встроено в Laravel |
| `ui` | Frontend UI | [→](https://packagist.org/search?q=laravel+ui+vue) | [laravel/breeze](https://packagist.org/packages/laravel/breeze) |
| `devtools` | Инструменты разработчика | [→](https://packagist.org/search?q=laravel+debug+telescope) | [laravel/telescope](https://packagist.org/packages/laravel/telescope) |

---

## Топ 20 пакетов

| Ранг | Пакет | Packagist | Звёзды | Сценарий использования | Оценка |
|------|-------|-----------|--------|------------------------|--------|
| 1 | [filament/filament](https://packagist.org/packages/filament/filament) | [→](https://packagist.org/packages/filament/filament) | 25k | Панель администратора | 96 |
| 2 | [spatie/laravel-permission](https://packagist.org/packages/spatie/laravel-permission) | [→](https://packagist.org/packages/spatie/laravel-permission) | 25k | RBAC | 95 |
| 3 | [laravel/horizon](https://packagist.org/packages/laravel/horizon) | [→](https://packagist.org/packages/laravel/horizon) | 7k | Мониторинг очередей | 95 |
| 4 | [laravel/telescope](https://packagist.org/packages/laravel/telescope) | [→](https://packagist.org/packages/laravel/telescope) | 12k | Отладка | 94 |
| 5 | [stancl/tenancy](https://packagist.org/packages/stancl/tenancy) | [→](https://packagist.org/packages/stancl/tenancy) | 5k | Мультиарендность | 94 |
| 6 | [pestphp/pest](https://packagist.org/packages/pestphp/pest) | [→](https://packagist.org/packages/pestphp/pest) | 11k | Тестирование | 93 |
| 7 | [laravel/scout](https://packagist.org/packages/laravel/scout) | [→](https://packagist.org/packages/laravel/scout) | 13k | Поиск | 92 |
| 8 | [guzzlehttp/guzzle](https://packagist.org/packages/guzzlehttp/guzzle) | [→](https://packagist.org/packages/guzzlehttp/guzzle) | 25k | HTTP-клиент | 92 |
| 9 | [spatie/laravel-activitylog](https://packagist.org/packages/spatie/laravel-activitylog) | [→](https://packagist.org/packages/spatie/laravel-activitylog) | 10k | Журнал активности | 90 |
| 10 | [spatie/laravel-medialibrary](https://packagist.org/packages/spatie/laravel-medialibrary) | [→](https://packagist.org/packages/spatie/laravel-medialibrary) | 10k | Медиа | 90 |
| 11 | [laravel/sanctum](https://packagist.org/packages/laravel/sanctum) | [→](https://packagist.org/packages/laravel/sanctum) | 8k | SPA-аутентификация | 90 |
| 12 | [spatie/laravel-backup](https://packagist.org/packages/spatie/laravel-backup) | [→](https://packagist.org/packages/spatie/laravel-backup) | 12k | Резервное копирование | 88 |
| 13 | [barryvdh/laravel-dompdf](https://packagist.org/packages/barryvdh/laravel-dompdf) | [→](https://packagist.org/packages/barryvdh/laravel-dompdf) | 12k | PDF | 88 |
| 14 | [maatwebsite/excel](https://packagist.org/packages/maatwebsite/excel) | [→](https://packagist.org/packages/maatwebsite/excel) | 13k | Excel | 88 |
| 15 | [tymon/jwt-auth](https://packagist.org/packages/tymon/jwt-auth) | [→](https://packagist.org/packages/tymon/jwt-auth) | 13k | JWT | 88 |
| 16 | [socialiteproviders/manager](https://packagist.org/packages/socialiteproviders/manager) | [→](https://packagist.org/packages/socialiteproviders/manager) | 10k | Социальный OAuth | 88 |
| 17 | [laravel/cashier](https://packagist.org/packages/laravel/cashier) | [→](https://packagist.org/packages/laravel/cashier) | 9k | Stripe-биллинг | 90 |
| 18 | [predis/predis](https://packagist.org/packages/predis/predis) | [→](https://packagist.org/packages/predis/predis) | 12k | Redis | 85 |
| 19 | [laravel/breeze](https://packagist.org/packages/laravel/breeze) | [→](https://packagist.org/packages/laravel/breeze) | 10k | Auth starter | 85 |
| 20 | [yansongda/pay](https://packagist.org/packages/yansongda/pay) | [→](https://packagist.org/packages/yansongda/pay) | 6k | Alipay/WeChat Pay | 88 |

> Выполните `php scripts/search.php top 20` для получения **live**-ранжирования с реальными данными Packagist.

---

## Система оценки

Пакеты оцениваются в реальном времени от 0 до 100:

| Критерий | Вес | Источник |
|----------|-----|---------|
| Звёзды GitHub | 15% | Packagist (github_stars) |
| Загрузки Packagist | 20% | API Packagist |
| Избранное | 10% | Packagist (favers) |
| Активность (≤30д=100) | 30% | Последний коммит |
| Совместимость с Laravel | 15% | composer.json |
| Качество описания | 10% | Не пустое = 100 |

---

## Установка

```bash
# Установка через ClawHub CLI
clawhub install laravel-package-search

# Или скачать с GitHub
git clone https://github.com/relunctance/laravel-package-search.git
cd laravel-package-search

# Запустить CLI
php scripts/search.php scenes
php scripts/search.php search auth 3
php scripts/search.php recommend "I need WeChat Pay for Laravel 11"
```

---

## Структура файлов

```
laravel-package-search/
├── SKILL.md                      # Спецификация Skill
├── README.md                     # Английская версия
├── README.zh-CN.md              # Китайский (упрощённый)
├── README.zh-TW.md              # Китайский (традиционный)
├── README.ja.md                 # Японская версия
├── README.ko.md                 # Корейская версия
├── README.fr.md                 # Французская версия
├── README.es.md                 # Испанская версия
├── README.de.md                 # Немецкая версия
├── README.it.md                 # Итальянская версия
├── README.ru.md                 # Русская версия
├── references/
│   ├── top20-packages.md        # Полный Top 20 с деталями
│   └── scene-index.md           # 22 сценария со ссылками Packagist
└── scripts/
    └── search.php               # CLI Packagist в реальном времени
```

---

## Интеграция с laravel-docs-reader

Этот skill содержит перекрёстные ссылки на официальную документацию Laravel через [laravel-docs-reader](https://clawhub.com/laravel-docs-reader):

```
✅ spatie/laravel-permission → docs по авторизации
✅ laravel/scout → docs по поиску в БД
✅ laravel/horizon → docs по очередям
✅ laravel/sanctum → docs по SPA-аутентификации
✅ filament/filament → filamentphp.com/docs
...
```

---

## Вклад

Нашли недостающий пакет или устаревшую информацию?
- 🐛 [Открыть Issue](https://github.com/relunctance/laravel-package-search/issues)
- 🔧 [Отправить PR](https://github.com/relunctance/laravel-package-search/pulls)

---

## Лицензия

MIT License | [GitHub](https://github.com/relunctance/laravel-package-search) | [ClawHub](https://clawhub.com/laravel-package-search)
