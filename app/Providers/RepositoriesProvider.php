<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoriesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // We can't concatenate string with constant, so we put it on a variable.
        $this->app->bind(
            'App\Repositories\Interfaces\PlantCaresInterface',
            'App\Repositories\Eloquent\PlantCaresRepository'
        );
        $this->app->bind(
            'App\Repositories\Interfaces\PlantsInterface',
            'App\Repositories\Eloquent\PlantsRepository'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
