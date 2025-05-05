<?php

use App\Models\GeneralSetting;

function generalSetting()
{
    return Cache::rememberForever('general-setting', function () {
        return GeneralSetting::first();
    });
}