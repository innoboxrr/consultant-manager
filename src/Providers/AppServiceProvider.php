<?php

namespace Innoboxrr\ConsultantManager\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        
        $this->mergeConfigFrom(__DIR__ . '/../../config/consultant-manager.php', 'consultant-manager');

    }

    public function boot()
    {
        
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        // $this->loadViewsFrom(__DIR__.'/../../resources/views', 'consultant-manager');

        if ($this->app->runningInConsole()) {
            
            // $this->publishes([__DIR__.'/../../resources/views' => resource_path('views/vendor/consultant-manager'),], 'views');

            $this->publishes([__DIR__.'/../../config/consultant-manager.php' => config_path('consultant-manager.php')], 'config');

        }

    }
    
}