<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(\App\Services\Payments\PaymentManager::class, function ($app) {
            return new \App\Services\Payments\PaymentManager($app);
        });

        $this->app->bind(\App\Contracts\PaymentGatewayInterface::class, function ($app) {
            return $app->make(\App\Services\Payments\PaymentManager::class);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
