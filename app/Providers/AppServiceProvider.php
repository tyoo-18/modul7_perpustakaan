<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\URL; // <--- Wajib diimpor agar tidak error

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
        // Memaksa seluruh URL dan form action Laravel otomatis menjadi HTTPS di Vercel
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        Gate::define('kelola-buku', function ($user) {
            return $user->hasAnyRole(['admin', 'petugas']);
        });
    }
}