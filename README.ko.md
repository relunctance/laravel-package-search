# Laravel Package Search

**English** | [中文](README.zh-CN.md) | [繁體中文](README.zh-TW.md) | [日本語](README.ja.md) | [한국어](README.ko.md) | [Français](README.fr.md) | [Español](README.es.md) | [Deutsch](README.de.md) | [Italiano](README.it.md) | [Русский](README.ru.md) | [Português (Brasil)](README.pt-BR.md)

---

## 개요

**Laravel Package Search**는 개발자가高品质な Laravel 생태계 패키지를 빠르게 찾고, 평가하며, 추천받을 수 있는 OpenClaw Agent Skill입니다.

[![Packagist](https://img.shields.io/packagist/v/laravel/framework?style=flat-square)](https://packagist.org/packages/laravel/framework)
[![Stars](https://img.shields.io/github/stars/relunctance/laravel-package-search?style=flat-square)](https://github.com/relunctance/laravel-package-search)
[![ClawHub](https://img.shields.io/badge/ClawHub-laravel--package--search-6C43E5?style=flat-square)](https://clawhub.com/laravel-package-search)

---

## 주요 기능

- 🔍 **실시간 Packagist API** — 매 쿼리마다 최신 데이터, 절대 오래된 데이터 없음
- 🗄️ **로컬 캐시 (1시간 TTL)** — 반복 쿼리도 빠르게 응답
- 🤖 **지능형シーン 감지** — 비즈니스 시나리오로 패키지 검색 (인증, 결제, AI 등)
- 📊 **품질 점수 매기기** — 스타 × 다운로드 × 활동도 × 호환성
- 📖 **Laravel 문서 상호 참조** — 공식 문서로 자동 링크 ([laravel-docs-reader](https://clawhub.com/laravel-docs-reader) 활용)
- 📦 **직접 설치 명령어** — `composer require` 복사해서 바로 사용

---

## 빠른 시작

```
사용자: "Laravel 11용 권한 패키지가 필요해요"
Bot: → 시나리오 감지: auth
     → 실시간 Packagist 검색: laravel+auth
     → 설치 명령어 + Packagist 링크와 함께 순위 목록 반환
```

---

## CLI 도구

```bash
php scripts/search.php search <시나리오> [제한]      # 시나리오로 검색 (auth, payment, ai...)
php scripts/search.php compare <패키지1> <패키지2>   # 두 패키지 비교
php scripts/search.php recommend <요구사항>           # 자연어 추천
php scripts/search.php top [제한]                   # 상위 N개 패키지 (기본값 10)
php scripts/search.php scenes                       # 전체 22개 시나리오 목록
```

---

## 지원 시나리오 (22개)

| 코드 | 시나리오 | Packagist 검색 | 주요 패키지 |
|------|---------|---------------|------------|
| `auth` | 인증 및 인가 | [→](https://packagist.org/search?q=laravel+auth) | [spatie/laravel-permission](https://packagist.org/packages/spatie/laravel-permission) |
| `payment` | 결제 및 청구 | [→](https://packagist.org/search?q=laravel+payment) | [yansongda/pay](https://packagist.org/packages/yansongda/pay) |
| `search` | 전체 텍스트 검색 | [→](https://packagist.org/search?q=laravel+search+scout) | [laravel/scout](https://packagist.org/packages/laravel/scout) |
| `admin` | 관리자 패널 | [→](https://packagist.org/search?q=laravel+admin+filament) | [filament/filament](https://packagist.org/packages/filament/filament) |
| `queue` | 큐 및 잡 | [→](https://packagist.org/search?q=laravel+queue+horizon) | [laravel/horizon](https://packagist.org/packages/laravel/horizon) |
| `excel` | Excel 가져오기/내보내기 | [→](https://packagist.org/search?q=laravel+excel) | [maatwebsite/excel](https://packagist.org/packages/maatwebsite/excel) |
| `media` | 미디어 및 파일 | [→](https://packagist.org/search?q=laravel+media) | [spatie/laravel-medialibrary](https://packagist.org/packages/spatie/laravel-medialibrary) |
| `wechat` | 위챗 / 미니프로그램 | [→](https://packagist.org/search?q=laravel+wechat) | [overtrue/laravel-wechat](https://packagist.org/packages/overtrue/laravel-wechat) |
| `multitenancy` | 멀티테넌시 SaaS | [→](https://packagist.org/search?q=laravel+multi-tenant) | [stancl/tenancy](https://packagist.org/packages/stancl/tenancy) |
| `ai` | AI / LLM 연동 | [→](https://packagist.org/search?q=laravel+openai+llm) | [openai-php/laravel](https://packagist.org/packages/openai-php/laravel) |
| `ratelimit` | 레이트 리밋 | [→](https://packagist.org/search?q=laravel+rate+limit) | Laravel 기본 제공 |
| `stripe` | Stripe 결제 | [→](https://packagist.org/search?q=laravel+stripe) | [laravel/cashier](https://packagist.org/packages/laravel/cashier) |
| `sms` | SMS 알림 | [→](https://packagist.org/search?q=laravel+sms) | [laravel/twilio](https://packagist.org/packages/laravel/twilio-notification-channel) |
| `logging` | 로깅 및 감사 | [→](https://packagist.org/search?q=laravel+log+activity) | [spatie/laravel-activitylog](https://packagist.org/packages/spatie/laravel-activitylog) |
| `api` | API 및 HTTP | [→](https://packagist.org/search?q=laravel+api) | [laravel/sanctum](https://packagist.org/packages/laravel/sanctum) |
| `testing` | 테스트 | [→](https://packagist.org/search?q=laravel+testing+pest) | [pestphp/pest](https://packagist.org/packages/pestphp/pest) |
| `cache` | 캐싱 | [→](https://packagist.org/search?q=laravel+redis+cache) | [predis/predis](https://packagist.org/packages/predis/predis) |
| `email` | 이메일 및 알림 | [→](https://packagist.org/search?q=laravel+mail) | [laravel/mail](https://packagist.org/packages/laravel/mail) |
| `storage` | 클라우드 스토리지 | [→](https://packagist.org/search?q=laravel+storage+s3) | [league/flysystem-aws-s3-v3](https://packagist.org/packages/league/flysystem-aws-s3-v3) |
| `security` | 보안 | [→](https://packagist.org/search?q=laravel+security) | Laravel 기본 제공 |
| `ui` | 프론트엔드 UI | [→](https://packagist.org/search?q=laravel+ui+vue) | [laravel/breeze](https://packagist.org/packages/laravel/breeze) |
| `devtools` | 개발자 도구 | [→](https://packagist.org/search?q=laravel+debug+telescope) | [laravel/telescope](https://packagist.org/packages/laravel/telescope) |

---

## Top 20 패키지

| 순위 | 패키지 | Packagist | GitHub 스타 | 용도 | 점수 |
|------|--------|-----------|------------|------|------|
| 1 | [filament/filament](https://packagist.org/packages/filament/filament) | [→](https://packagist.org/packages/filament/filament) | 25k | 관리자 패널 | 96 |
| 2 | [spatie/laravel-permission](https://packagist.org/packages/spatie/laravel-permission) | [→](https://packagist.org/packages/spatie/laravel-permission) | 25k | RBAC | 95 |
| 3 | [laravel/horizon](https://packagist.org/packages/laravel/horizon) | [→](https://packagist.org/packages/laravel/horizon) | 7k | 큐 모니터링 | 95 |
| 4 | [laravel/telescope](https://packagist.org/packages/laravel/telescope) | [→](https://packagist.org/packages/laravel/telescope) | 12k | 디버깅 | 94 |
| 5 | [stancl/tenancy](https://packagist.org/packages/stancl/tenancy) | [→](https://packagist.org/packages/stancl/tenancy) | 5k | 멀티테넌시 | 94 |
| 6 | [pestphp/pest](https://packagist.org/packages/pestphp/pest) | [→](https://packagist.org/packages/pestphp/pest) | 11k | 테스팅 | 93 |
| 7 | [laravel/scout](https://packagist.org/packages/laravel/scout) | [→](https://packagist.org/packages/laravel/scout) | 13k | 검색 | 92 |
| 8 | [guzzlehttp/guzzle](https://packagist.org/packages/guzzlehttp/guzzle) | [→](https://packagist.org/packages/guzzlehttp/guzzle) | 25k | HTTP 클라이언트 | 92 |
| 9 | [spatie/laravel-activitylog](https://packagist.org/packages/spatie/laravel-activitylog) | [→](https://packagist.org/packages/spatie/laravel-activitylog) | 10k | 활동 로그 | 90 |
| 10 | [spatie/laravel-medialibrary](https://packagist.org/packages/spatie/laravel-medialibrary) | [→](https://packagist.org/packages/spatie/laravel-medialibrary) | 10k | 미디어 | 90 |
| 11 | [laravel/sanctum](https://packagist.org/packages/laravel/sanctum) | [→](https://packagist.org/packages/laravel/sanctum) | 8k | SPA 인증 | 90 |
| 12 | [spatie/laravel-backup](https://packagist.org/packages/spatie/laravel-backup) | [→](https://packagist.org/packages/spatie/laravel-backup) | 12k | 백업 | 88 |
| 13 | [barryvdh/laravel-dompdf](https://packagist.org/packages/barryvdh/laravel-dompdf) | [→](https://packagist.org/packages/barryvdh/laravel-dompdf) | 12k | PDF | 88 |
| 14 | [maatwebsite/excel](https://packagist.org/packages/maatwebsite/excel) | [→](https://packagist.org/packages/maatwebsite/excel) | 13k | Excel | 88 |
| 15 | [tymon/jwt-auth](https://packagist.org/packages/tymon/jwt-auth) | [→](https://packagist.org/packages/tymon/jwt-auth) | 13k | JWT | 88 |
| 16 | [socialiteproviders/manager](https://packagist.org/packages/socialiteproviders/manager) | [→](https://packagist.org/packages/socialiteproviders/manager) | 10k | 소셜 OAuth | 88 |
| 17 | [laravel/cashier](https://packagist.org/packages/laravel/cashier) | [→](https://packagist.org/packages/laravel/cashier) | 9k | Stripe 결제 | 90 |
| 18 | [predis/predis](https://packagist.org/packages/predis/predis) | [→](https://packagist.org/packages/predis/predis) | 12k | Redis | 85 |
| 19 | [laravel/breeze](https://packagist.org/packages/laravel/breeze) | [→](https://packagist.org/packages/laravel/breeze) | 10k | 인증 스타터 | 85 |
| 20 | [yansongda/pay](https://packagist.org/packages/yansongda/pay) | [→](https://packagist.org/packages/yansongda/pay) | 6k | Alipay/WeChat Pay | 88 |

> `php scripts/search.php top 20`을 실행하면 실시간 Packagist 데이터로 순위를 가져올 수 있습니다.

---

## 점수 매기기

패키지는 실시간으로 0-100점까지 점수를 매깁니다:

| 기준 | 가중치 | 데이터 소스 |
|------|--------|-----------|
| GitHub 스타 수 | 15% | Packagist (github_stars) |
| Packagist 다운로드 수 | 20% | Packagist API |
| 즐겨찾기 수 | 10% | Packagist (favers) |
| 활동도 (≤30일=100) | 30% | 마지막 커밋 날짜 |
| Laravel 호환성 | 15% | composer.json |
| 설명 품질 | 10% | 비어있지 않으면 = 100 |

---

## 설치

```bash
# ClawHub CLI로 설치
clawhub install laravel-package-search

# 또는 GitHub에서 다운로드
git clone https://github.com/relunctance/laravel-package-search.git
cd laravel-package-search

# CLI 실행
php scripts/search.php scenes
php scripts/search.php search auth 3
php scripts/search.php recommend "I need WeChat Pay for Laravel 11"
```

---

## 파일 구조

```
laravel-package-search/
├── SKILL.md                      # Skill 스펙
├── README.md                     # 영어版
├── README.zh-CN.md              # 중국어 간체版
├── README.zh-TW.md              # 중국어 번체版
├── README.ja.md                 # 일본어版
├── README.ko.md                 # 한국어版
├── references/
│   ├── top20-packages.md        # 상세정보 포함 Top 20
│   └── scene-index.md           # Packagist 링크 포함 전체 22 시나리오
└── scripts/
    └── search.php               # 실시간 Packagist CLI
```

---

## laravel-docs-reader 연동

이 Skill은 [laravel-docs-reader](https://clawhub.com/laravel-docs-reader)를 통해 Laravel 공식 문서를 상호 참조합니다:

```
✅ spatie/laravel-permission → 인가 문서
✅ laravel/scout → 데이터베이스 검색 문서
✅ laravel/horizon → 큐 문서
✅ laravel/sanctum → SPA 인증 문서
✅ filament/filament → filamentphp.com/docs
...
```

---

## 기여

누락된 패키지나 오래된 정보를 발견하셨나요?
- 🐛 [이슈 열기](https://github.com/relunctance/laravel-package-search/issues)
- 🔧 [PR 제출](https://github.com/relunctance/laravel-package-search/pulls)

---

## 라이선스

MIT License | [GitHub](https://github.com/relunctance/laravel-package-search) | [ClawHub](https://clawhub.com/laravel-package-search)
