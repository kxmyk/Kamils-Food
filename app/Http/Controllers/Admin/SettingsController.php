<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class SettingsController extends Controller
{
    function index(): View
    {
        return view('admin.settings.index');
    }

    function updateGeneralSettings()
    {
        
    }
}
