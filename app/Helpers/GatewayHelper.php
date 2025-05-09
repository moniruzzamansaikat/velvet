<?php

namespace App\Helpers;

use App\Models\PaymentGateway;

trait GatewayHelper
{
    public static function filledConfig()
    {
        $model = PaymentGateway::where('key', static::$key)->first();

        if (!$model)
            return static::$config;

        static::$staticConfig = static::$config;

        static::$config = $model->config;

        return static::getConfigInput(true);
    }


    public static function getConfigInput($returnFromDb = false)
    {
        $inputs = [];

        foreach (($returnFromDb ? static::$staticConfig : static::$config) as $confKey => $confLabel) {
            $label = $returnFromDb ? static::$staticConfig[$confKey] : '';

            $value = $returnFromDb ? static::$config?->$confKey : '';

            $inputs[] = '<div class="form-group">
                <label for="' . htmlspecialchars($confKey) . '" class="form-label">' . __($label) . '</label>
                <input type="text" class="form-control" value="' . htmlspecialchars($value) . '" name="config[' . htmlspecialchars($confKey) . ']" />
            </div>';
        }

        return $inputs;
    }

    public static function paymentGateways($key = null, $fromDb = false, $createIfNotExists = false)
    {
        $classes = getClassesInNamespace('App\Services\Gateways');

        $gateways = [];

        foreach ($classes as $gatewayClassName) {
            $class = "App\\Services\\Gateways\\$gatewayClassName";

            $gateways[] = [
                'key' => $class::getKey(),
                'image' => $class::getImage(),
                'config' => $class::getConfig(),
                'class' => $class
            ];

            if (!$fromDb) {
                $gateways['config_input'] = $class::getConfigInput();
            }
        }

        if ($createIfNotExists) {
            self::createIfNotExists($gateways);
        }

        if ($key) {
            return collect($gateways)->where('key', $key)->first();
        }

        return $gateways;
    }

    public static function getKey()
    {
        return static::$key;
    }

    public static function getImage()
    {
        return static::$image;
    }

    public static function getConfig()
    {
        return static::$config;
    }

    protected function paymentSuccess()
    {
        return to_route('user.payment.history')->withSuccess(__('Payment successfull'));
    }

    private static function createIfNotExists($gatewaysFromClass)
    {
        foreach ($gatewaysFromClass as $gatewayFromClass) {
            if (empty($gatewayFromClass['key'])) {
                continue;
            }

            $dbEntry = PaymentGateway::firstOrCreate(
                ['key' => $gatewayFromClass['key']],
                [
                    'name' => ucfirst($gatewayFromClass['key']),
                    'image' => $gatewayFromClass['image'],
                    'config' => array_combine(
                        array_keys($gatewayFromClass['config']),
                        array_map(fn() => '-------------', $gatewayFromClass['config'])
                    )
                ]
            );
        }
    }
}