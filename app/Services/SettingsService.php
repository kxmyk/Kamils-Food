<?php

namespace App\Services;

use App\Models\Settings;
use Illuminate\Support\Facades\Cache;
use PhpOffice\PhpSpreadsheet\Calculation\Web\Service;

class SettingsService extends Service
{
    function setGlobalSettings(): void
    {
        $settings = $this->getSettings();
        config()->set('settings', $settings);
    }

    function getSettings(): array
    {
        return Cache::rememberForever('settings', function () {
            return Settings::pluck('value', 'key')->toArray();
        });
    }

    function clearCachedSettings(): void
    {
        Cache::forget('settings');
    }
}
