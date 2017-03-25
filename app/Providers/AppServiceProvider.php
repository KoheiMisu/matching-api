<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Reliese\Coders\CodersServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register(CodersServiceProvider::class);
        }
    }
}
