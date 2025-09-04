<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\ResetPassword;
use Illuminate\Support\Facades\Route;





Route::middleware(['guest'])->group(function () {
    // Authentication Routes
    Route::get('/login', Login::class)
        ->name('login');
    Route::get('/register', Register::class)
        ->name('register');
    Route::get('/forgot-password', ForgotPassword::class)
        ->name('forgot-password');
    Route::get('/reset-password/{token}', ResetPassword::class)
        ->name('password.reset');
    Route::get('/reset-password', fn () => abort(404)); // to prevent get error when access without token
});


// main page
Route::middleware(['auth'])->group(function () {
    Route::get('/verify-email', \App\Livewire\Auth\VerifyEmail::class)
        ->name('verify-email');

    Route::middleware(['verified'])->group(function () {
        Route::view('/', 'welcome'); // الصفحة الرئيسية
    });
});
