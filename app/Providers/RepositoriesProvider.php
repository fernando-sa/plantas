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
        $this->app->bind(
            'App\Repositories\Interfaces\PlantCaresInterface',
            'App\Repositories\Eloquent\PlantCaresRepository'
        );

        $this->app->bind(
            'App\Repositories\Interfaces\PlantsInterface',
            'App\Repositories\Eloquent\PlantsRepository'
        );

        $this->app->bind(
            'App\Repositories\Interfaces\UsersInterface',
            'App\Repositories\Eloquent\UsersRepository'
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
