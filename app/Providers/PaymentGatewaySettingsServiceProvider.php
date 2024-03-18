<?php

namespace App\Providers;

use App\Services\PaymentGatewaySettingsService;
use Illuminate\Support\ServiceProvider;

class PaymentGatewaySettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(PaymentGatewaySettingsService::class, function () {
            return new PaymentGatewaySettingsService();
        });

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $paymentGatewaySetting = $this->app->make(PaymentGatewaySettingsService::class);
        $paymentGatewaySetting->setGlobalSettings();

    }
}
