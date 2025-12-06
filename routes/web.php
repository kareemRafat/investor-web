<?php

use App\Http\Controllers\LogoutController;
use Livewire\Livewire;
use App\Livewire\Pages\FAQ;
use App\Livewire\Auth\Login;
use App\Livewire\Pages\Home;
use App\Livewire\Pages\About;
use App\Livewire\Pages\Terms;
use App\Livewire\Auth\Register;
use App\Livewire\Pages\Contact;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Pages\Idea\IdeaForm;
use App\Livewire\Pages\Idea\IdeaInfo;
use App\Livewire\Pages\Idea\IdeaSummary;
use App\Livewire\Pages\Idea\Index as IdeaIndex;
use App\Livewire\Pages\Investment\Index as InvestmentIndex;
use App\Livewire\Pages\PrivacyPolicy;
use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Investment\InvestmentForm;
use App\Livewire\Pages\Investment\InvestmentInfo;
use App\Livewire\Pages\Investment\InvestmentSummary;
use App\Livewire\Pages\Profile;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

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
            Route::get('/reset-password', fn() => abort(404)); // to prevent get error when access without token
        });


        // main page
        Route::middleware(['auth'])->group(function () {
            Route::get('/verify-email', \App\Livewire\Auth\VerifyEmail::class)
                ->name('verify-email');
            Route::post('/logout', LogoutController::class)->name('logout');
        });

        Route::middleware(['auth', 'verified'])->group(function () {
            // Main pages
            Route::get('/', Home::class)->name('main.home');
            Route::get('/contact', Contact::class)->name('main.contact');
            Route::get('/terms-of-use', Terms::class)->name('main.terms');
            Route::get('/faq', FAQ::class)->name('main.faq');
            Route::get('/privacy-policy', PrivacyPolicy::class)->name('main.privacypolicy');
            Route::get('/about', About::class)->name('main.about');


            // Submit your Idea
            Route::get('/ideas' , IdeaIndex::class)->name('idea.index');
            Route::get('/ideas/new', IdeaForm::class)->name('idea.main');
            Route::get('/ideas/{idea}/summary', IdeaSummary::class)->name('idea.summary');
            Route::get('/ideas/{idea}/info' , IdeaInfo::class )->name('idea.info');

            // Investor
            Route::get('/investment' , InvestmentIndex::class)->name('investor.index');
            Route::get('/investment/new', InvestmentForm::class)->name('investor.main');
            Route::get('/investment/{investment}/summary', InvestmentSummary::class)->name('investor.summary');
            Route::get('/investment/{investment}/info' , InvestmentInfo::class )->name('investor.info');

            // profile
            Route::get('/profile', Profile::class)->name('main.profile');
        });

        // to make livewire3 work with localiaztion
        Livewire::setUpdateRoute(function ($handle) {
            return Route::post('/livewire/update', $handle);
        });
        Livewire::setScriptRoute(function ($handle) {
            return Route::get('/livewire/livewire.js', $handle);
        });
    }
);
