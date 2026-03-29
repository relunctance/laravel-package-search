# Laravel Package Search

**English** | [中文](README.zh-CN.md) | [繁體中文](README.zh-TW.md) | [日本語](README.ja.md) | [한국어](README.ko.md) | [Français](README.fr.md) | [Español](README.es.md) | [Deutsch](README.de.md) | [Italiano](README.it.md) | [Русский](README.ru.md) | [Português (Brasil)](README.pt-BR.md)

---

## Visão geral

**Laravel Package Search** é um Agent Skill do OpenClaw que ajuda desenvolvedores a encontrar, avaliar e recomendar rapidamente pacotes de alta qualidade no ecossistema Laravel.

[![Packagist](https://img.shields.io/packagist/v/laravel/framework?style=flat-square)](https://packagist.org/packages/laravel/framework)
[![Stars](https://img.shields.io/github/stars/relunctance/laravel-package-search?style=flat-square)](https://github.com/relunctance/laravel-package-search)
[![ClawHub](https://img.shields.io/badge/ClawHub-laravel--package--search-6C43E5?style=flat-square)](https://clawhub.com/laravel-package-search)

---

## Funcionalidades

- 🔍 **API Packagist em tempo real** — dados sempre frescos em cada consulta
- 🗄️ **Cache local (TTL 1h)** — consultas repetidas rápidas
- 🤖 **Detecção inteligente de cena** — encontre pacotes por cenário de negócio (autenticação, pagamento, IA, etc.)
- 📊 **Pontuação de qualidade** — estrelas × downloads × atividade × compatibilidade
- 📖 **Referências cruzadas docs Laravel** — links automáticos para documentação oficial (via [laravel-docs-reader](https://clawhub.com/laravel-docs-reader))
- 📦 **Comandos de instalação diretos** — `composer require` pronto para copiar

---

## Início rápido

```
Você: "Preciso de um pacote de permissões para Laravel 11"
Bot: → Cena detectada: auth
     → Busca Packagist ao vivo: laravel+auth
     → Retorna pacotes ranqueados com comandos de instalação + links Packagist
```

---

## Ferramenta CLI

```bash
php scripts/search.php search <cena> [limite]      # Buscar por cena (auth, payment, ai...)
php scripts/search.php compare <pkg1> <pkg2>        # Comparar dois pacotes
php scripts/search.php recommend <requisito>         # Recomendação em linguagem natural
php scripts/search.php top [limite]                  # Top N pacotes (padrão 10)
php scripts/search.php scenes                        # Listar todas as 22 cenas
```

---

## Cenas suportadas (22)

| Código | Cena | Busca Packagist | Pacote principal |
|--------|------|-----------------|------------------|
| `auth` | Autenticação e Autorização | [→](https://packagist.org/search?q=laravel+auth) | [spatie/laravel-permission](https://packagist.org/packages/spatie/laravel-permission) |
| `payment` | Pagamento e Faturamento | [→](https://packagist.org/search?q=laravel+payment) | [yansongda/pay](https://packagist.org/packages/yansongda/pay) |
| `search` | Busca em texto completo | [→](https://packagist.org/search?q=laravel+search+scout) | [laravel/scout](https://packagist.org/packages/laravel/scout) |
| `admin` | Painel de administração | [→](https://packagist.org/search?q=laravel+admin+filament) | [filament/filament](https://packagist.org/packages/filament/filament) |
| `queue` | Filas e Jobs | [→](https://packagist.org/search?q=laravel+queue+horizon) | [laravel/horizon](https://packagist.org/packages/laravel/horizon) |
| `excel` | Importação/Exportação Excel | [→](https://packagist.org/search?q=laravel+excel) | [maatwebsite/excel](https://packagist.org/packages/maatwebsite/excel) |
| `media` | Mídia e Arquivos | [→](https://packagist.org/search?q=laravel+media) | [spatie/laravel-medialibrary](https://packagist.org/packages/spatie/laravel-medialibrary) |
| `wechat` | WeChat / Mini Programa | [→](https://packagist.org/search?q=laravel+wechat) | [overtrue/laravel-wechat](https://packagist.org/packages/overtrue/laravel-wechat) |
| `multitenancy` | SaaS Multi-inquilino | [→](https://packagist.org/search?q=laravel+multi-tenant) | [stancl/tenancy](https://packagist.org/packages/stancl/tenancy) |
| `ai` | Integração AI / LLM | [→](https://packagist.org/search?q=laravel+openai+llm) | [openai-php/laravel](https://packagist.org/packages/openai-php/laravel) |
| `ratelimit` | Limitação de taxa | [→](https://packagist.org/search?q=laravel+rate+limit) | Integrado ao Laravel |
| `stripe` | Pagamentos Stripe | [→](https://packagist.org/search?q=laravel+stripe) | [laravel/cashier](https://packagist.org/packages/laravel/cashier) |
| `sms` | Notificações SMS | [→](https://packagist.org/search?q=laravel+sms) | [laravel/twilio](https://packagist.org/packages/laravel/twilio-notification-channel) |
| `logging` | Log e Auditoria | [→](https://packagist.org/search?q=laravel+log+activity) | [spatie/laravel-activitylog](https://packagist.org/packages/spatie/laravel-activitylog) |
| `api` | API e HTTP | [→](https://packagist.org/search?q=laravel+api) | [laravel/sanctum](https://packagist.org/packages/laravel/sanctum) |
| `testing` | Testes | [→](https://packagist.org/search?q=laravel+testing+pest) | [pestphp/pest](https://packagist.org/packages/pestphp/pest) |
| `cache` | Cache | [→](https://packagist.org/search?q=laravel+redis+cache) | [predis/predis](https://packagist.org/packages/predis/predis) |
| `email` | Email e Notificações | [→](https://packagist.org/search?q=laravel+mail) | [laravel/mail](https://packagist.org/packages/laravel/mail) |
| `storage` | Armazenamento em nuvem | [→](https://packagist.org/search?q=laravel+storage+s3) | [league/flysystem-aws-s3-v3](https://packagist.org/packages/league/flysystem-aws-s3-v3) |
| `security` | Segurança | [→](https://packagist.org/search?q=laravel+security) | Integrado ao Laravel |
| `ui` | UI Frontend | [→](https://packagist.org/search?q=laravel+ui+vue) | [laravel/breeze](https://packagist.org/packages/laravel/breeze) |
| `devtools` | Ferramentas de desenvolvedor | [→](https://packagist.org/search?q=laravel+debug+telescope) | [laravel/telescope](https://packagist.org/packages/laravel/telescope) |

---

## Top 20 Pacotes

| Rank | Pacote | Packagist | Estrelas | Caso de uso | Pontuação |
|------|--------|-----------|----------|-------------|-----------|
| 1 | [filament/filament](https://packagist.org/packages/filament/filament) | [→](https://packagist.org/packages/filament/filament) | 25k | Painel admin | 96 |
| 2 | [spatie/laravel-permission](https://packagist.org/packages/spatie/laravel-permission) | [→](https://packagist.org/packages/spatie/laravel-permission) | 25k | RBAC | 95 |
| 3 | [laravel/horizon](https://packagist.org/packages/laravel/horizon) | [→](https://packagist.org/packages/laravel/horizon) | 7k | Monitoramento de filas | 95 |
| 4 | [laravel/telescope](https://packagist.org/packages/laravel/telescope) | [→](https://packagist.org/packages/laravel/telescope) | 12k | Debugging | 94 |
| 5 | [stancl/tenancy](https://packagist.org/packages/stancl/tenancy) | [→](https://packagist.org/packages/stancl/tenancy) | 5k | Multi-inquilino | 94 |
| 6 | [pestphp/pest](https://packagist.org/packages/pestphp/pest) | [→](https://packagist.org/packages/pestphp/pest) | 11k | Testes | 93 |
| 7 | [laravel/scout](https://packagist.org/packages/laravel/scout) | [→](https://packagist.org/packages/laravel/scout) | 13k | Busca | 92 |
| 8 | [guzzlehttp/guzzle](https://packagist.org/packages/guzzlehttp/guzzle) | [→](https://packagist.org/packages/guzzlehttp/guzzle) | 25k | Cliente HTTP | 92 |
| 9 | [spatie/laravel-activitylog](https://packagist.org/packages/spatie/laravel-activitylog) | [→](https://packagist.org/packages/spatie/laravel-activitylog) | 10k | Log de atividade | 90 |
| 10 | [spatie/laravel-medialibrary](https://packagist.org/packages/spatie/laravel-medialibrary) | [→](https://packagist.org/packages/spatie/laravel-medialibrary) | 10k | Mídia | 90 |
| 11 | [laravel/sanctum](https://packagist.org/packages/laravel/sanctum) | [→](https://packagist.org/packages/laravel/sanctum) | 8k | Auth SPA | 90 |
| 12 | [spatie/laravel-backup](https://packagist.org/packages/spatie/laravel-backup) | [→](https://packagist.org/packages/spatie/laravel-backup) | 12k | Backup | 88 |
| 13 | [barryvdh/laravel-dompdf](https://packagist.org/packages/barryvdh/laravel-dompdf) | [→](https://packagist.org/packages/barryvdh/laravel-dompdf) | 12k | PDF | 88 |
| 14 | [maatwebsite/excel](https://packagist.org/packages/maatwebsite/excel) | [→](https://packagist.org/packages/maatwebsite/excel) | 13k | Excel | 88 |
| 15 | [tymon/jwt-auth](https://packagist.org/packages/tymon/jwt-auth) | [→](https://packagist.org/packages/tymon/jwt-auth) | 13k | JWT | 88 |
| 16 | [socialiteproviders/manager](https://packagist.org/packages/socialiteproviders/manager) | [→](https://packagist.org/packages/socialiteproviders/manager) | 10k | OAuth social | 88 |
| 17 | [laravel/cashier](https://packagist.org/packages/laravel/cashier) | [→](https://packagist.org/packages/laravel/cashier) | 9k | Faturamento Stripe | 90 |
| 18 | [predis/predis](https://packagist.org/packages/predis/predis) | [→](https://packagist.org/packages/predis/predis) | 12k | Redis | 85 |
| 19 | [laravel/breeze](https://packagist.org/packages/laravel/breeze) | [→](https://packagist.org/packages/laravel/breeze) | 10k | Auth starter | 85 |
| 20 | [yansongda/pay](https://packagist.org/packages/yansongda/pay) | [→](https://packagist.org/packages/yansongda/pay) | 6k | Alipay/WeChat Pay | 88 |

> Execute `php scripts/search.php top 20` para obter rankings **em tempo real** com dados reais do Packagist.

---

## Sistema de pontuação

Pacotes são pontuados de 0-100 em tempo real:

| Critério | Peso | Fonte |
|----------|------|-------|
| Estrelas GitHub | 15% | Packagist (github_stars) |
| Downloads Packagist | 20% | API Packagist |
| Favoritos | 10% | Packagist (favers) |
| Atividade (≤30d=100) | 30% | Último commit |
| Compatibilidade Laravel | 15% | composer.json |
| Qualidade da descrição | 10% | Não vazio = 100 |

---

## Instalação

```bash
# Instalar via ClawHub CLI
clawhub install laravel-package-search

# Ou baixar do GitHub
git clone https://github.com/relunctance/laravel-package-search.git
cd laravel-package-search

# Executar CLI
php scripts/search.php scenes
php scripts/search.php search auth 3
php scripts/search.php recommend "I need WeChat Pay for Laravel 11"
```

---

## Estrutura de arquivos

```
laravel-package-search/
├── SKILL.md                      # Especificação do Skill
├── README.md                     # Versão em inglês
├── README.zh-CN.md              # Versão chinês simplificado
├── README.zh-TW.md              # Versão chinês tradicional
├── README.ja.md                 # Versão japonesa
├── README.ko.md                 # Versão coreana
├── README.fr.md                 # Versão francesa
├── README.es.md                 # Versão espanhola
├── README.de.md                 # Versão alemã
├── README.it.md                 # Versão italiana
├── README.ru.md                 # Versão russa
├── README.pt-BR.md              # Versão português (Brasil)
├── references/
│   ├── top20-packages.md        # Top 20 completo com detalhes
│   └── scene-index.md           # 22 cenas com links Packagist
└── scripts/
    └── search.php               # CLI Packagist em tempo real
```

---

## Integração com laravel-docs-reader

Este skill faz referências cruzadas à documentação oficial do Laravel através de [laravel-docs-reader](https://clawhub.com/laravel-docs-reader):

```
✅ spatie/laravel-permission → docs de Autorização
✅ laravel/scout → docs de Busca em banco de dados
✅ laravel/horizon → docs de Filas
✅ laravel/sanctum → docs de Auth SPA
✅ filament/filament → filamentphp.com/docs
...
```

---

## Contribuindo

Encontrou um pacote faltando ou informação desatualizada?
- 🐛 [Abrir uma Issue](https://github.com/relunctance/laravel-package-search/issues)
- 🔧 [Enviar um PR](https://github.com/relunctance/laravel-package-search/pulls)

---

## Licença

MIT License | [GitHub](https://github.com/relunctance/laravel-package-search) | [ClawHub](https://clawhub.com/laravel-package-search)
