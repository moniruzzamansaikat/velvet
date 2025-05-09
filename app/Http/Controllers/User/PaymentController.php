<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\PaymentGateway;
use App\Services\GatewayFactory;
use Illuminate\Http\Request;
use Iyzipay\Model\Address;
use Iyzipay\Model\BasketItem;
use Iyzipay\Model\BasketItemType;
use Iyzipay\Model\Buyer;
use Iyzipay\Model\CheckoutForm;
use Iyzipay\Model\CheckoutFormInitialize;
use Iyzipay\Model\PaymentGroup;
use Iyzipay\Request\CreateCheckoutFormInitializeRequest;
use Iyzipay\Request\RetrieveCheckoutFormRequest;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function paymentHistory() 
    {
        $title = 'Payment History';

        $payments = auth()->user()->payments()->paginate();
        
        return view('user.payment.history', compact('title', 'payments'));
    }
    
    public function newPayment(Request $request)
    {
        $title = 'New Payment';

        $paymentGateways = PaymentGateway::all();

        return view('user.payment.new', compact('title', 'paymentGateways'));
    }

    public function notify(Request $request, $key)
    {
        $class = \App\Helpers\GatewayHelper::paymentGateways($key)['class'];

        return (new $class())->verify($request);
    }

    public function paymentInsert(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|gt:0',
            'payment_gateway_id' => 'required|exists:payment_gateways,id'
        ]);

        $paymentGateway = PaymentGateway::where('status', 1)->findOrFail($request->payment_gateway_id);

        $gatewayCode = $paymentGateway->key;

        $payment = new Payment();
        $payment->user_id = auth()->id();
        $payment->status = 'pending';
        $payment->amount = $request->amount;
        $payment->currency = 'usd';
        $payment->transaction_no = generateTransactionId();
        $payment->payment_gateway_id = $request->payment_gateway_id;
        $payment->method = $gatewayCode;
        // $payment->save();

        $gateway = GatewayFactory::make($gatewayCode);
        return $gateway->create($payment);



        return redirect()->away($paymentPageUrl);

        dd($paymentPageUrl, $iframeContent);

        return response()->json([
            'iframe' => $iframeContent,
            'url' => $paymentPageUrl
        ]);


        $request = new \Iyzipay\Request\CreatePaymentRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setPrice("1");
        $request->setPaidPrice("1.2");
        $request->setCurrency(\Iyzipay\Model\Currency::TL);
        $request->setInstallment(1);
        $request->setBasketId("B67832");
        $request->setPaymentChannel(\Iyzipay\Model\PaymentChannel::WEB);
        $request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);


        // $paymentCard = new \Iyzipay\Model\PaymentCard();
        // $paymentCard->setCardHolderName("John Doe");
        // $paymentCard->setCardNumber("5528790000000008");
        // $paymentCard->setExpireMonth("12");
        // $paymentCard->setExpireYear("2030");
        // $paymentCard->setCvc("123");
        // $paymentCard->setRegisterCard(0);
        // $request->setPaymentCard($paymentCard);

        $buyer = new \Iyzipay\Model\Buyer();
        $buyer->setId("BY789");
        $buyer->setName("John");
        $buyer->setSurname("Doe");
        $buyer->setGsmNumber("+905350000000");
        $buyer->setEmail("email@email.com");
        $buyer->setIdentityNumber("74300864791");
        $buyer->setLastLoginDate("2015-10-05 12:43:35");
        $buyer->setRegistrationDate("2013-04-21 15:12:09");
        $buyer->setRegistrationAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $buyer->setIp("85.34.78.112");
        $buyer->setCity("Istanbul");
        $buyer->setCountry("Turkey");
        $buyer->setZipCode("34732");
        $request->setBuyer($buyer);

        $shippingAddress = new \Iyzipay\Model\Address();
        $shippingAddress->setContactName("Jane Doe");
        $shippingAddress->setCity("Istanbul");
        $shippingAddress->setCountry("Turkey");
        $shippingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $shippingAddress->setZipCode("34742");
        $request->setShippingAddress($shippingAddress);

        $billingAddress = new \Iyzipay\Model\Address();
        $billingAddress->setContactName("Jane Doe");
        $billingAddress->setCity("Istanbul");
        $billingAddress->setCountry("Turkey");
        $billingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $billingAddress->setZipCode("34742");
        $request->setBillingAddress($billingAddress);

        $basketItems = array();
        $firstBasketItem = new \Iyzipay\Model\BasketItem();
        $firstBasketItem->setId("BI101");
        $firstBasketItem->setName("Binocular");
        $firstBasketItem->setCategory1("Collectibles");
        $firstBasketItem->setCategory2("Accessories");
        $firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
        $firstBasketItem->setPrice("0.3");
        $basketItems[0] = $firstBasketItem;

        $secondBasketItem = new \Iyzipay\Model\BasketItem();
        $secondBasketItem->setId("BI102");
        $secondBasketItem->setName("Game code");
        $secondBasketItem->setCategory1("Game");
        $secondBasketItem->setCategory2("Online Game Items");
        $secondBasketItem->setItemType(\Iyzipay\Model\BasketItemType::VIRTUAL);
        $secondBasketItem->setPrice("0.5");
        $basketItems[1] = $secondBasketItem;

        $thirdBasketItem = new \Iyzipay\Model\BasketItem();
        $thirdBasketItem->setId("BI103");
        $thirdBasketItem->setName("Usb");
        $thirdBasketItem->setCategory1("Electronics");
        $thirdBasketItem->setCategory2("Usb / Cable");
        $thirdBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
        $thirdBasketItem->setPrice("0.2");
        $basketItems[2] = $thirdBasketItem;
        $request->setBasketItems($basketItems);

        $payment = \Iyzipay\Model\Payment::create($request, $options);

        dd($payment);


        // $gateway = GatewayFactory::make($gatewayCode);
        // $redirectUrl = $gateway->create($payment);

        // if ($gatewayCode === 'iyzico') {
        //     return view('user.payment.iyzico_form', ['formContent' => $redirectUrl]);
        // }

        return redirect()->away($redirectUrl);
    }

    public function paymentSuccess(Request $request)
    {
        $payment = Payment::findOrFail($request->pid);

        if ($payment->status === 'success') {
            return redirect()->route('user.dashboard')->with('info', 'Already processed');
        }

        $gateway = GatewayFactory::make($payment->method);

        if ($gateway->verify($payment)) {
            $payment->status = 'success';
            $payment->save();

            $user = auth()->user();
            $user->balance += $payment->amount;
            $user->save();

            return redirect()->route('user.dashboard')->with('success', 'Payment successful!');
        }

        return redirect()->route('user.dashboard')->with('error', 'Payment failed or incomplete.');
    }
}
