<?php

namespace App\Services;

use App\Models\PaymentGatewaySetting;
use Illuminate\Support\Facades\Cache;

class PaymentGatewaySettingsService
{
    function setGlobalSettings(): void
    {
        $settings = $this->getSettings();
        config()->set('gatewaySettings', $settings);
    }

    function getSettings()
    {
        return Cache::rememberForever('gatewaySettings', function () {
            return PaymentGatewaySetting::pluck('value', 'key')->toArray(); // ['key' => 'value']
        });
    }

    function clearCachedSettings(): void
    {
        Cache::forget('gatewaySettings');
    }

}
