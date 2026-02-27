<?php

use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\LogoutController;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Auth\VerifyEmail;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\EmailVerificationNotificationController;
use Laravel\Fortify\Http\Controllers\NewPasswordController;
use Laravel\Fortify\Http\Controllers\PasswordResetLinkController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Http\Controllers\VerifyEmailController;
use Laravel\Fortify\Http\Requests\VerifyEmailRequest;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// Google Authentication
Route::get('/auth/google/redirect', [GoogleController::class, 'redirectToGoogle'])
    ->middleware(['web', 'guest'])
    ->name('auth.google.redirect');

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {
        Route::middleware(['guest'])->group(function () {
            // Authentication Routes
            Route::get('/login', Login::class)
                ->name('login');
            Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->name('login.store');

            Route::get('/register', Register::class)
                ->name('register');
            Route::post('/register', [RegisteredUserController::class, 'store'])
                ->name('register.store');

            Route::get('/forgot-password', ForgotPassword::class)
                ->name('forgot-password');
            Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

            Route::get('/reset-password/{token}', ResetPassword::class)
                ->name('password.reset');
            Route::post('/reset-password', [NewPasswordController::class, 'store'])
                ->name('password.update');

            Route::get('/reset-password', fn () => abort(404)); // to prevent get error when access without token
        });

        // Email Verification Notice & Logout
        Route::middleware(['auth'])->group(function () {
            Route::get('/email/verify', VerifyEmail::class)
                ->name('verification.notice');
            Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware(['throttle:6,1'])
                ->name('verification.send');
            Route::post('/logout', LogoutController::class)->name('logout');
        });
    }
);

// Google Callback (Outside localization group to match the URI in Google Console)
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])
    ->middleware(['web', 'guest'])
    ->name('auth.google.callback');

// Localized and Signed Verification Link (Outside localization group to avoid double prefix)
Route::get('/{locale}/email/verify/{id}/{hash}', function ($locale, VerifyEmailRequest $request) {
    app()->setLocale($locale);

    return app(VerifyEmailController::class)->__invoke($request);
})->middleware(['web', 'auth', 'signed', 'throttle:6,1'])
    ->name('verification.verify')
    ->where('locale', '[a-zA-Z]{2}');
