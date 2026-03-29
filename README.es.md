# Laravel Package Search

**English** | [中文](README.zh-CN.md) | [繁體中文](README.zh-TW.md) | [日本語](README.ja.md) | [한국어](README.ko.md) | [Français](README.fr.md) | [Español](README.es.md) | [Deutsch](README.de.md) | [Italiano](README.it.md) | [Русский](README.ru.md) | [Português (Brasil)](README.pt-BR.md)

---

## Descripción

**Laravel Package Search** es un Agent Skill de OpenClaw que ayuda a los desarrolladores a encontrar, evaluar y recomendar rápidamente paquetes de alta calidad del ecosistema Laravel.

[![Packagist](https://img.shields.io/packagist/v/laravel/framework?style=flat-square)](https://packagist.org/packages/laravel/framework)
[![Stars](https://img.shields.io/github/stars/relunctance/laravel-package-search?style=flat-square)](https://github.com/relunctance/laravel-package-search)
[![ClawHub](https://img.shields.io/badge/ClawHub-laravel--package--search-6C43E5?style=flat-square)](https://clawhub.com/laravel-package-search)

---

## Características

- 🔍 **API Packagist en tiempo real** — datos siempre frescos en cada consulta
- 🗄️ **Caché local (TTL 1h)** — consultas repetidas rápidas
- 🤖 **Detección inteligente de escenario** — encuentra paquetes por escenario de negocio (auth, pago, IA, etc.)
- 📊 **Puntuación de calidad** — estrellas × descargas × actividad × compatibilidad
- 📖 **Referencias cruzadas de docs Laravel** — enlaces automáticos a documentación oficial (vía [laravel-docs-reader](https://clawhub.com/laravel-docs-reader))
- 📦 **Comandos de instalación directos** — `composer require` listo para copiar

---

## Inicio rápido

```
Tú: "Necesito un paquete de permisos para Laravel 11"
Bot: → Escenario detectado: auth
     → Búsqueda Packagist en vivo: laravel+auth
     → Devuelve paquetes ordenados con comandos de instalación + enlaces Packagist
```

---

## Herramienta CLI

```bash
php scripts/search.php search <escenario> [límite]    # Buscar por escenario (auth, payment, ai...)
php scripts/search.php compare <pkg1> <pkg2>          # Comparar dos paquetes
php scripts/search.php recommend <requisito>            # Recomendación en lenguaje natural
php scripts/search.php top [límite]                    # Top N paquetes (predeterminado 10)
php scripts/search.php scenes                         # Listar los 22 escenarios
```

---

## Escenarios soportados (22)

| Código | Escenario | Búsqueda Packagist | Paquete principal |
|--------|-----------|--------------------|--------------------|
| `auth` | Autenticación y Autorización | [→](https://packagist.org/search?q=laravel+auth) | [spatie/laravel-permission](https://packagist.org/packages/spatie/laravel-permission) |
| `payment` | Pago y Facturación | [→](https://packagist.org/search?q=laravel+payment) | [yansongda/pay](https://packagist.org/packages/yansongda/pay) |
| `search` | Búsqueda de texto completo | [→](https://packagist.org/search?q=laravel+search+scout) | [laravel/scout](https://packagist.org/packages/laravel/scout) |
| `admin` | Panel de administración | [→](https://packagist.org/search?q=laravel+admin+filament) | [filament/filament](https://packagist.org/packages/filament/filament) |
| `queue` | Cola y Jobs | [→](https://packagist.org/search?q=laravel+queue+horizon) | [laravel/horizon](https://packagist.org/packages/laravel/horizon) |
| `excel` | Importación/Exportación Excel | [→](https://packagist.org/search?q=laravel+excel) | [maatwebsite/excel](https://packagist.org/packages/maatwebsite/excel) |
| `media` | Medios y Archivos | [→](https://packagist.org/search?q=laravel+media) | [spatie/laravel-medialibrary](https://packagist.org/packages/spatie/laravel-medialibrary) |
| `wechat` | WeChat / Mini Programa | [→](https://packagist.org/search?q=laravel+wechat) | [overtrue/laravel-wechat](https://packagist.org/packages/overtrue/laravel-wechat) |
| `multitenancy` | SaaS Multi-inquilino | [→](https://packagist.org/search?q=laravel+multi-tenant) | [stancl/tenancy](https://packagist.org/packages/stancl/tenancy) |
| `ai` | Integración AI / LLM | [→](https://packagist.org/search?q=laravel+openai+llm) | [openai-php/laravel](https://packagist.org/packages/openai-php/laravel) |
| `ratelimit` | Limitación de tasa | [→](https://packagist.org/search?q=laravel+rate+limit) | Integrado en Laravel |
| `stripe` | Pagos con Stripe | [→](https://packagist.org/search?q=laravel+stripe) | [laravel/cashier](https://packagist.org/packages/laravel/cashier) |
| `sms` | Notificaciones SMS | [→](https://packagist.org/search?q=laravel+sms) | [laravel/twilio](https://packagist.org/packages/laravel/twilio-notification-channel) |
| `logging` | Registro y Auditoría | [→](https://packagist.org/search?q=laravel+log+activity) | [spatie/laravel-activitylog](https://packagist.org/packages/spatie/laravel-activitylog) |
| `api` | API y HTTP | [→](https://packagist.org/search?q=laravel+api) | [laravel/sanctum](https://packagist.org/packages/laravel/sanctum) |
| `testing` | Testing | [→](https://packagist.org/search?q=laravel+testing+pest) | [pestphp/pest](https://packagist.org/packages/pestphp/pest) |
| `cache` | Caché | [→](https://packagist.org/search?q=laravel+redis+cache) | [predis/predis](https://packagist.org/packages/predis/predis) |
| `email` | Email y Notificaciones | [→](https://packagist.org/search?q=laravel+mail) | [laravel/mail](https://packagist.org/packages/laravel/mail) |
| `storage` | Almacenamiento en la nube | [→](https://packagist.org/search?q=laravel+storage+s3) | [league/flysystem-aws-s3-v3](https://packagist.org/packages/league/flysystem-aws-s3-v3) |
| `security` | Seguridad | [→](https://packagist.org/search?q=laravel+security) | Integrado en Laravel |
| `ui` | UI Frontend | [→](https://packagist.org/search?q=laravel+ui+vue) | [laravel/breeze](https://packagist.org/packages/laravel/breeze) |
| `devtools` | Herramientas de desarrollo | [→](https://packagist.org/search?q=laravel+debug+telescope) | [laravel/telescope](https://packagist.org/packages/laravel/telescope) |

---

## Top 20 Paquetes

| Rango | Paquete | Packagist | Estrellas | Caso de uso | Puntuación |
|-------|---------|-----------|-----------|-------------|-----------|
| 1 | [filament/filament](https://packagist.org/packages/filament/filament) | [→](https://packagist.org/packages/filament/filament) | 25k | Panel admin | 96 |
| 2 | [spatie/laravel-permission](https://packagist.org/packages/spatie/laravel-permission) | [→](https://packagist.org/packages/spatie/laravel-permission) | 25k | RBAC | 95 |
| 3 | [laravel/horizon](https://packagist.org/packages/laravel/horizon) | [→](https://packagist.org/packages/laravel/horizon) | 7k | Monitoreo de cola | 95 |
| 4 | [laravel/telescope](https://packagist.org/packages/laravel/telescope) | [→](https://packagist.org/packages/laravel/telescope) | 12k | Depuración | 94 |
| 5 | [stancl/tenancy](https://packagist.org/packages/stancl/tenancy) | [→](https://packagist.org/packages/stancl/tenancy) | 5k | Multi-inquilino | 94 |
| 6 | [pestphp/pest](https://packagist.org/packages/pestphp/pest) | [→](https://packagist.org/packages/pestphp/pest) | 11k | Testing | 93 |
| 7 | [laravel/scout](https://packagist.org/packages/laravel/scout) | [→](https://packagist.org/packages/laravel/scout) | 13k | Búsqueda | 92 |
| 8 | [guzzlehttp/guzzle](https://packagist.org/packages/guzzlehttp/guzzle) | [→](https://packagist.org/packages/guzzlehttp/guzzle) | 25k | Cliente HTTP | 92 |
| 9 | [spatie/laravel-activitylog](https://packagist.org/packages/spatie/laravel-activitylog) | [→](https://packagist.org/packages/spatie/laravel-activitylog) | 10k | Registro de actividad | 90 |
| 10 | [spatie/laravel-medialibrary](https://packagist.org/packages/spatie/laravel-medialibrary) | [→](https://packagist.org/packages/spatie/laravel-medialibrary) | 10k | Medios | 90 |
| 11 | [laravel/sanctum](https://packagist.org/packages/laravel/sanctum) | [→](https://packagist.org/packages/laravel/sanctum) | 8k | Auth SPA | 90 |
| 12 | [spatie/laravel-backup](https://packagist.org/packages/spatie/laravel-backup) | [→](https://packagist.org/packages/spatie/laravel-backup) | 12k | Respaldo | 88 |
| 13 | [barryvdh/laravel-dompdf](https://packagist.org/packages/barryvdh/laravel-dompdf) | [→](https://packagist.org/packages/barryvdh/laravel-dompdf) | 12k | PDF | 88 |
| 14 | [maatwebsite/excel](https://packagist.org/packages/maatwebsite/excel) | [→](https://packagist.org/packages/maatwebsite/excel) | 13k | Excel | 88 |
| 15 | [tymon/jwt-auth](https://packagist.org/packages/tymon/jwt-auth) | [→](https://packagist.org/packages/tymon/jwt-auth) | 13k | JWT | 88 |
| 16 | [socialiteproviders/manager](https://packagist.org/packages/socialiteproviders/manager) | [→](https://packagist.org/packages/socialiteproviders/manager) | 10k | OAuth social | 88 |
| 17 | [laravel/cashier](https://packagist.org/packages/laravel/cashier) | [→](https://packagist.org/packages/laravel/cashier) | 9k | Facturación Stripe | 90 |
| 18 | [predis/predis](https://packagist.org/packages/predis/predis) | [→](https://packagist.org/packages/predis/predis) | 12k | Redis | 85 |
| 19 | [laravel/breeze](https://packagist.org/packages/laravel/breeze) | [→](https://packagist.org/packages/laravel/breeze) | 10k | Auth starter | 85 |
| 20 | [yansongda/pay](https://packagist.org/packages/yansongda/pay) | [→](https://packagist.org/packages/yansongda/pay) | 6k | Alipay/WeChat Pay | 88 |

> Ejecuta `php scripts/search.php top 20` para obtener rankings **en tiempo real** con datos reales de Packagist.

---

## Sistema de puntuación

Los paquetes se puntúan de 0-100 en tiempo real:

| Criterio | Peso | Fuente |
|----------|------|--------|
| Estrellas GitHub | 15% | Packagist (github_stars) |
| Descargas Packagist | 20% | API Packagist |
| Favoritos | 10% | Packagist (favers) |
| Actividad (≤30d=100) | 30% | Último commit |
| Compatibilidad Laravel | 15% | composer.json |
| Calidad de la descripción | 10% | No vacío = 100 |

---

## Instalación

```bash
# Instalar vía ClawHub CLI
clawhub install laravel-package-search

# O descargar desde GitHub
git clone https://github.com/relunctance/laravel-package-search.git
cd laravel-package-search

# Ejecutar CLI
php scripts/search.php scenes
php scripts/search.php search auth 3
php scripts/search.php recommend "I need WeChat Pay for Laravel 11"
```

---

## Estructura de archivos

```
laravel-package-search/
├── SKILL.md                      # Especificación del Skill
├── README.md                     # Versión en inglés
├── README.zh-CN.md              # Versión chino simplificado
├── README.zh-TW.md              # Versión chino tradicional
├── README.ja.md                 # Versión japonesa
├── README.ko.md                 # Versión coreana
├── README.fr.md                 # Versión francesa
├── README.es.md                 # Versión española
├── references/
│   ├── top20-packages.md        # Top 20 completo con detalles
│   └── scene-index.md           # 22 escenarios con enlaces Packagist
└── scripts/
    └── search.php               # CLI Packagist en tiempo real
```

---

## Integración con laravel-docs-reader

Este skill hace referencias cruzadas a la documentación oficial de Laravel a través de [laravel-docs-reader](https://clawhub.com/laravel-docs-reader):

```
✅ spatie/laravel-permission → docs de Autorización
✅ laravel/scout → docs de Búsqueda en base de datos
✅ laravel/horizon → docs de Colas
✅ laravel/sanctum → docs de Auth SPA
✅ filament/filament → filamentphp.com/docs
...
```

---

## Contribuir

¿Encontraste un paquete que falta o información desactualizada?
- 🐛 [Abrir un Issue](https://github.com/relunctance/laravel-package-search/issues)
- 🔧 [Enviar un PR](https://github.com/relunctance/laravel-package-search/pulls)

---

## Licencia

MIT License | [GitHub](https://github.com/relunctance/laravel-package-search) | [ClawHub](https://clawhub.com/laravel-package-search)
