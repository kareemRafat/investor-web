<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\ResetPassword;
use Illuminate\Support\Facades\Route;

// Authentication Routes
Route::get('/login', Login::class)
    ->name('login');
Route::get('/register', Register::class)
    ->name('register');

Route::middleware(['guest'])->group(function () {
    Route::get('/forgot-password', ForgotPassword::class)
        ->name('forgot-password');
    Route::get('/reset-password/{token}', ResetPassword::class)
        ->name('password.reset');
});


// main page
Route::middleware(['auth'])->group(function () {
    Route::view('/', 'welcome');
});
