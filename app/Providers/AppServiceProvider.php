<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\AnimalServiceInterface;
use App\Contracts\SpeciesServiceInterface;
use \App\Services\SQLAnimalService;
use \App\Services\SQLSpeciesService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AnimalServiceInterface::class, SQLAnimalService::class);
    
        $this->app->bind( SpeciesServiceInterface::class, SQLSpeciesService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
