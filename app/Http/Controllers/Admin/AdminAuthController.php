<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class AdminAuthController extends Controller
{
    function index(): View
    {
        return view('admin.auth.login');
    }
}
