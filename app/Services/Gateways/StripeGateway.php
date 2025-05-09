<?php

namespace App\Services\Gateways;

use App\Models\Payment;
use Iyzipay\Model\CheckoutForm;
use Iyzipay\Request\RetrieveCheckoutFormRequest;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class StripeGateway extends Gateway implements PaymentGatewayInterface
{
    protected static $key = 'stripe';

    protected static $image = 'stripe.jpeg';

    protected static $config = [
        'api_key' => 'Api Key',
        'secret_key' => 'Secret Key',
    ];

    public function getSupportedCurrencies(): array
    {
        return ["TRY", "USD", "EUR", "GBP", "RUB", "CHF", "NOK"];
    }

    public function create(Payment $payment): string
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([
            'mode' => 'payment',
            'success_url' => route('payment.success', ['pid' => $payment->id]),
            'line_items' => [
                [
                    'quantity' => 1,
                    'price_data' => [
                        'currency' => $payment->currency,
                        'unit_amount' => $payment->amount * 100,
                        'product_data' => ['name' => 'Payment']
                    ]
                ]
            ],
        ]);

        $payment->meta = ['stripe_session_id' => $session->id];
        $payment->save();

        return redirect()->away($session->url);
    }

    public function verify($request)
    {
        $token = $request->input('token');

        if (!$token) {
            return response()->json(['error' => 'Missing token'], 400);
        }

        $options = new \Iyzipay\Options();
        $options->setApiKey(env('IYZICO_API_KEY'));
        $options->setSecretKey(env('IYZICO_SECRET_KEY'));
        $options->setBaseUrl("https://sandbox-api.iyzipay.com");

        $retrieveRequest = new RetrieveCheckoutFormRequest();
        $retrieveRequest->setLocale(\Iyzipay\Model\Locale::TR);
        $retrieveRequest->setToken($token);

        $checkoutForm = CheckoutForm::retrieve($retrieveRequest, $options);

        if ($checkoutForm->getStatus() === 'success') {
            $paymentStatus = $checkoutForm->getPaymentStatus(); // "SUCCESS"
            $conversationId = $checkoutForm->getConversationId(); // useful for tracking

            if ($paymentStatus == 'SUCCESS') {

            }

            dd($paymentStatus, $conversationId);

        }
    }
}
