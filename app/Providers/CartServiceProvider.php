<?php

namespace App\Providers;

use Illuminate\Session\SessionManager;
use Illuminate\Support\ServiceProvider;
use App\Services\Cart;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(Cart::class, function ($app) {
            return new Cart($app->make(SessionManager::class));
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
