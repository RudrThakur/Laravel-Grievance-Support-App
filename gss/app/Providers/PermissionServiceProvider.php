<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // You can use a class for composer
        // you will need NavComposer@compose method
        // which will be called everythime partials.nav is requested
        view()->composer(
            '*', 'App\Http\ViewComposers\PermissionComposer'
        );

    }
}
