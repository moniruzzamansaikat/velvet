<?php

namespace App\Services;

use App\Services\Gateways\IyzicoGateway;
use App\Services\Gateways\StripeGateway;
use App\Services\Gateways\PaymentGatewayInterface;
use App\Services\Gateways\TwoCheckoutGateway;

class GatewayFactory
{
    public static function make(string $gateway): PaymentGatewayInterface
    {
        return match ($gateway) {
            'stripe'    => new StripeGateway(),
            '2checkout' => new TwoCheckoutGateway(),
            'iyzico'    => new IyzicoGateway(),
            default     => throw new \Exception('Unsupported gateway'),
        };
    }
}
