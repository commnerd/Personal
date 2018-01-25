<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LogoutController extends Controller
{
    /**
     * Log user out
     */
    public function handleLogout(): RedirectResponse
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
