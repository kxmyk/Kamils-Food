<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    function index(): View
    {
        return view('admin.settings.index');
    }

    function updateGeneralSettings(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'site_name' => ['required', 'max:255'],
            'site_default_currency' => ['required', 'max:3'],
            'site_currency_icon' => ['required', 'max:3'],
            'site_currency_icon_position' => ['required', 'max:255']
        ]);

        foreach ($validatedData as $key => $value) {
            Settings::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
        
        toastr('Updated Successfully');

        return redirect()->back();
    }
}
