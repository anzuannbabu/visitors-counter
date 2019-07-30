<?php

namespace Advintech\VisitorsCounter;

use Illuminate\Support\ServiceProvider;

class VisitorsCounterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Advintech\VisitorsCounter\Controllers\VisitorsCounterController');
        $this->app->make('Advintech\VisitorsCounter\Models\VisitorsCounter');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //load routes
        $this->loadRoutesFrom(__DIR__.'/routes.php');

        //load migrations
        $this->loadMigrationsFrom(__DIR__.'/Migrations');

        //load models
        
        //public assets files
        $this->publishes([
            __DIR__.'/assets' => public_path('vendor/visitors-counter'),
        ], 'advintech-visitors-counter');
    }
}
