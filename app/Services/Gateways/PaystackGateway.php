<?php

namespace App\Services\Gateways;

use App\Models\Payment;
use App\Traits\GatewayHelper;
use Illuminate\Support\Facades\Http;

class PaystackGateway extends Gateway implements PaymentGatewayInterface
{
    protected static $key = 'paystack';
    protected static $image = 'paystack.png';
    protected static $config = [
        'api_key' => 'Api Key',
        'secret_key' => 'Secret Key',
    ];

    public function getSupportedCurrencies(): array
    {
        return ["NGN", "USD", "EUR", "GBP"];
    }

    /**
     * Create payment with Paystack API
     */
    public function create(Payment $payment): string
    {
        $apiKey = config('services.paystack.api_key');
        
        // Set up Paystack payment initiation URL
        $url = 'https://api.paystack.co/transaction/initialize';
        
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
        ])->post($url, [
            'amount' => $payment->amount * 100, 
            'email' => $payment->user->email,
            'callback_url' => route('payment.notify', ['gateway' => 'paystack']),
            'currency' => $payment->currency,
            'order_id' => $payment->id,
            'metadata' => [
                'order_id' => $payment->id,
            ],
        ]);
        
        if ($response->failed()) {
            return response()->json(['error' => 'Unable to initiate payment'], 500);
        }

        $data = $response->json();

        // Save transaction reference or URL if needed
        $payment->meta = [
            'paystack_reference' => $data['data']['reference']
        ];
        $payment->save();

        return redirect($data['data']['authorization_url']);
    }

    /**
     * Verify the payment and update user information 
     * @param mixed $request
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function verify($request)
    {
        $reference = $request->input('reference');

        if (!$reference) {
            return response()->json(['error' => 'Missing reference'], 400);
        }

        // Retrieve the transaction details
        $url = "https://api.paystack.co/transaction/verify/$reference";
        $apiKey = config('services.paystack.api_key');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
        ])->get($url);

        if ($response->failed()) {
            return response()->json(['error' => 'Unable to verify payment'], 500);
        }

        $data = $response->json();
        
        // Find the payment based on the reference
        $payment = Payment::where('meta->paystack_reference', $reference)->first();
        
        if (!$payment) {
            return response()->json(['error' => 'Payment not found'], 404);
        }

        if ($data['data']['status'] == 'success') {
            $payment->status = 'paid';
            $payment->paid_at = now();
            $payment->meta = array_merge($payment->meta ?? [], [
                'paystack_transaction_id' => $data['data']['id'],
            ]);
            $payment->save();

            return $this->paymentSuccess();
        }

        return response()->json(['error' => 'Payment failed'], 400);
    }
}
