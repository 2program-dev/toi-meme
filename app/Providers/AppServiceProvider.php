<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Filament::serving(function () {
            $user = auth()->user();

            // limito l'accesso all'area admin di Filament solo agli utenti con ruolo 'admin'
            if ($user && $user->role !== 'admin') {
                abort(403);
            }
        });
    }
}
