<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            'App\Repositories\Contracts\ProductRepositoryInterface',
            'App\Repositories\Eloquent\ProductRepository'
        );

        $this->app->bind(
            'App\Repositories\Contracts\SaleRepositoryInterface',
            'App\Repositories\Eloquent\SaleRepository'
        );

        $this->app->bind(
            'App\Repositories\Contracts\SaleItemRepositoryInterface',
            'App\Repositories\Eloquent\SaleItemRepository'
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
