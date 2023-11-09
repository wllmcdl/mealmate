<?php

namespace App\Providers;

use App\Services\Contracts\FoodServiceInterface;
use App\Services\FoodDataCentralService;
use Illuminate\Support\ServiceProvider;

class FoodServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton('fdcApiKey', function () {
            return config('food.fdcApiKey');
        });

        $this->app->bind(
            FoodServiceInterface::class,
            FoodDataCentralService::class
        );
    }

    public function boot(): void
    {
        //
    }
}
