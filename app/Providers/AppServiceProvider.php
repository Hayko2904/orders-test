<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Repositories\OrderRepository;
use Src\Repositories\RepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(RepositoryInterface::class, OrderRepository::class);
    }
}
