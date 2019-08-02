<?php

namespace Anzuann\VisitorsCounter;

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
        $this->app->make('Anzuann\VisitorsCounter\Controllers\VisitorsCounterController');
        $this->app->make('Anzuann\VisitorsCounter\Models\VisitorsCounter');
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

        //load views and publish them
        $this->loadViewsFrom(__DIR__.'/Views','visitors-counter');

        
        //public assets files
        $this->publishes([
            __DIR__.'/assets' => public_path('vendor/visitors-counter'),
            __DIR__.'/Views' => resource_path('views/vendor/visitors-counter'),
            __DIR__.'/config/anzuann_visitors_counter.php' => config_path('anzuann_visitors_counter.php'),
        ], 'anzuann-visitors-counter');


    }
}
