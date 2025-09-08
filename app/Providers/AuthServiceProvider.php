<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Gate::define('access-admin-panel', function ($user) {
            if ($user->is_admin === 1) {
                return true;
            }
            Log::warning('Unauthorized admin panel access attempt', [
                'user_id' => $user->id,
                'email' => $user->email,
                'timestamp' => now(),
            ]);
            return false;
        });
    }
}
