<?php

namespace App\Providers;

use App\Repositories\ServiceRepository;
use App\Repositories\ServiceRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class ServiceRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ServiceRepositoryInterface::class, ServiceRepository::class);
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
