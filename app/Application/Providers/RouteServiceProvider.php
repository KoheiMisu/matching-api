<?php

namespace App\Application\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Request;
use App\Application\Services\BulkOperator;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, etc.
     */
    public function boot()
    {
        parent::boot();

        Route::bind('teamRequest', function ($value) {
            if ($value === 'bulkTeamRequest') {
                return $this->registerEntity4Bulk($value);
            }
        });
    }

    /**
     * Define the routes for the application.
     */
    public function map()
    {
        require base_path('app/Application/routes/application_api.php');
    }

    /**
     * @param string $modelKey
     */
    private function registerEntity4Bulk(string $modelKey)
    {
        foreach (config('bulkModels') as $key => $needComponent) {
            if ($modelKey === $key) {
                $this->app->singleton('BulkOperator', function ($app) use ($needComponent) {
                    return new BulkOperator(
                        $app->make($needComponent['repository']),
                        $app->make($needComponent['transformer'])
                    );
                });

                return app()->make('BulkOperator')->bindModels();
            }
        }

        abort(404, 'Invalid Request, cannot find update target');
    }
}
