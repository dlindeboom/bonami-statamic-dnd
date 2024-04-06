<?php

declare(strict_types=1);

namespace App\Providers;

use App\View\Components\Alerts\Error;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\URL;
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
        // For production, force the URL to be https (secure)
        if (App::environment('production')) {
            URL::forceScheme('https');
        }

        // If more components are added, we need to make a service provider for the components
        Blade::component('alert-error', Error::class);
    }
}
