<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        View::composer('partials.topbar', function ($view): void {
            $notificaciones = collect();

            if (auth()->check() && Schema::hasTable('notifications')) {
                $notificaciones = auth()->user()
                    ->unreadNotifications()
                    ->latest()
                    ->take(5)
                    ->get();
            }

            $view->with('notificacionesNoLeidas', $notificaciones);
        });
    }
}
