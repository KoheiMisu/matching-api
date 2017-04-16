<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Dingo\Api\Transformer\Adapter\Fractal;
use League\Fractal\Manager;
use App\Application\Http\Serializers\CustomJsonSerializer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->app['Dingo\Api\Transformer\Factory']->setAdapter(function ($app) {
            $fractal = new Manager();
            $fractal->setSerializer(new CustomJsonSerializer());

            return new Fractal($fractal);
        });
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        foreach (config('repositories') as $repository) {
            $this->app->singleton($repository);
        }
    }
}
