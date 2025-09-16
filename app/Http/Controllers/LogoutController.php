<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


class LogoutController extends Controller
{
    public function __invoke()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        $locale = LaravelLocalization::getCurrentLocale();
        return redirect()->to(LaravelLocalization::localizeURL(route('login', absolute: false), $locale));
    }
}
