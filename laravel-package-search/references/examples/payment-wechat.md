# Example: Payment & WeChat (Chinese)

## 场景需求

**用户**: "我想在 Laravel 11 里接入微信支付，包括 JSAPI 支付（公众号）和小程序支付。"

---

## 🎯 推荐结果

### 最佳选择: overtrue/laravel-wechat

**推荐指数**: ⭐⭐⭐ 75/100
**维护状态**: 活跃（2025-10 更新）
**兼容性**: Laravel 8 / 9 / 10 ✅ | Laravel 11 ⚠️ 部分兼容

**推荐理由**:
- 覆盖微信生态全场景（支付/小程序/公众号/企业微信）
- 中文文档完整
- 社区活跃

**替代方案**:
- `yansongda/pay` (⭐⭐⭐⭐ 88) - 更活跃的国产支付 SDK
- `hardzhang/laravel-wechatpay-v3` (⭐⭐⭐ 72) - 微信支付 v3 API

---

### 安装步骤

```bash
composer require overtrue/laravel-wechat
php artisan vendor:publish --provider="Overtrue\LaravelWeChat\ServiceProvider"
```

### 配置 (.env)

```env
# 小程序
WECHAT_MINI_PROGRAM_APPID=wx1234567890abcdef
WECHAT_MINI_PROGRAM_SECRET=your_secret_here

# 微信公众号
WECHAT_OFFICIAL_ACCOUNT_APPID=wx1234567890abcdef
WECHAT_OFFICIAL_ACCOUNT_SECRET=your_secret_here

# 微信支付 (V2)
WECHAT_PAYMENT_MCH_ID=1234567890
WECHAT_PAYMENT_KEY=your_payment_key
WECHAT_PAYMENT_CERT_PATH=/path/to/apiclient_cert.pem
WECHAT_PAYMENT_KEY_PATH=/path/to/apiclient_key.pem

# 微信支付 (V3) - 推荐
WECHAT_PAYMENT_V3_MCH_ID=1234567890
WECHAT_PAYMENT_V3_PRIVATE_KEY_PATH=/path/to/private_key.pem
WECHAT_PAYMENT_V3_CERTIFICATIONS_PATH=/path/to/wechatpay_cert.pem
WECHAT_PAYMENT_V3_API_KEY=your_api_key_v3
```

### 配置合并 (app/Providers/AppServiceProvider.php)

```php
use Overtrue\LaravelWeChat\Facade as WeChat;

public function register(): void
{
    // V3 支付配置
    config([
        'wechat.payment.v3.mch_id' => env('WECHAT_PAYMENT_V3_MCH_ID'),
        'wechat.payment.v3.private_key' => file_get_contents(storage_path(env('WECHAT_PAYMENT_V3_PRIVATE_KEY_PATH'))),
        'wechat.payment.v3.certificates' => storage_path(env('WECHAT_PAYMENT_V3_CERTIFICATIONS_PATH')),
    ]);
}
```

### JSAPI 统一下单 (公众号支付)

```php
use Overtrue\LaravelWeChat\Facade as WeChat;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function unify(Request $request)
    {
        $user = $request->user();
        $order = Order::find($request->order_id);

        try {
            $payment = WeChat::payment();

            $result = $payment->v3->pay->transactions->native([
                'description' => "订单支付 #{$order->order_no}",
                'out_trade_no' => $order->order_no,
                'amount' => [
                    'total' => $order->amount * 100, // 单位：分
                ],
                'payer' => [
                    'openid' => $user->openid,
                ],
            ]);

            // 获取支付二维码链接
            $codeUrl = $result['code_url'];

            return response()->json([
                'code_url' => $codeUrl,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    // 支付回调
    public function notify()
    {
        $payment = WeChat::payment();
        $response = $payment->handlePaidNotify(function ($message, $fail) {
            $orderNo = $message['out_trade_no'];
            $order = Order::where('order_no', $orderNo)->first();

            if ($message['trade_state'] === 'SUCCESS') {
                $order->update(['status' => 'paid']);
            }

            return true; // 返回 true 表示处理成功
        });

        return $response;
    }
}
```

### 小程序支付

```php
// 小程序内调起支付
class MiniProgramPaymentController extends Controller
{
    public function createPayment(Order $order)
    {
        $payment = WeChat::mini_program()->payment;

        $result = $payment->prepare($order, [
            'description' => "订单 #{$order->order_no}",
            'amount' => [
                'total' => $order->amount * 100,
            ],
            'payer' => [
                'openid' => auth('mini_program')->user()->openid,
            ],
        ]);

        return response()->json([
            'prepay_id' => $result['prepay_id'],
        ]);
    }
}
```

---

## 备选方案: yansongda/pay (推荐支付 SDK)

如果需要更活跃的维护和多支付通道:

```bash
composer require yansongda/pay
```

```php
// config/pay.php
return [
    'alipay' => [
        'default' => [...],
    ],
    'wechat' => [
        'default' => [
            'mch_id' => env('WECHAT_PAYMENT_MCH_ID'),
            'mch_key' => env('WECHAT_PAYMENT_KEY'),
            'mch_cert' => env('WECHAT_PAYMENT_CERT_PATH'),
            'mch_key_cert' => env('WECHAT_PAYMENT_KEY_PATH'),
        ],
    ],
];

// 发起支付
use Yansongda\Pay\Pay;

$order = [
    'out_trade_no' => time(),
    'total_fee' => 1, // 分
    'body' => 'test',
];

$alipay = Pay::alipay($config)->scan($order);
$wechat = Pay::wechat($config)->scan($order);
```

---

## 决策建议

| 场景 | 推荐 |
|------|------|
| 微信全生态（支付+小程序+公众号） | overtrue/laravel-wechat ✅ |
| 需要支付宝+微信双支付 | yansongda/pay ✅ |
| 只需微信支付 V3 API | hardzhang/laravel-wechatpay-v3 ⚠️ |
| Stripe 国际支付 | novamedia/laravel-stripe ✅ |
