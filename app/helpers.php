<?php

use App\Models\GeneralSetting;

function generalSetting($key = null)
{
    $generalSetting = Cache::rememberForever('general-setting', function () {
        return GeneralSetting::first();
    });

    if($key) return $generalSetting?->$key;

    return $generalSetting;
}

function admin()
{
    return auth('admin')->user();
}

function generateTransactionId($prefix = 'txn_'): string
{
    return strtoupper(uniqid($prefix, true)) . bin2hex(random_bytes(4));
}

function amount($amount = 0)
{
    return $amount;
}

function getClassesInNamespace(string $namespace): array
{
    $classes = [];
    foreach (get_declared_classes() as $class) {
        if (Str::startsWith($class, $namespace)) {
            $classes[] = class_basename($class);
        }
    }

    $classMap = require base_path('vendor/composer/autoload_classmap.php');


    foreach ($classMap as $class => $path) {
        if (Str::startsWith($class, $namespace) && class_exists($class)) {
            $reflection = new ReflectionClass($class);
            if (!$reflection->isAbstract()) {
                $classes[] = class_basename($class);
            }
        }
    }

    return array_unique($classes);
}