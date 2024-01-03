<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    function index(): View
    {
        return view('admin.profile.index');
    }

    function updateProfile(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        toastr('Data updated succesfully', 'success');

        return redirect()->back();
    }
}
