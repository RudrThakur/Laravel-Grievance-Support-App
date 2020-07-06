<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\ServiceInfo;
use App\LocationInfo;

class DropdownServiceProvider extends ServiceProvider
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
        view()->composer('user.services', function($view){

            $view->with(
                [
                'categories' => ServiceInfo::distinct()->pluck('category'),
                'blocks' => LocationInfo::distinct()->pluck('block')
                ]
            );

        });
    }
}