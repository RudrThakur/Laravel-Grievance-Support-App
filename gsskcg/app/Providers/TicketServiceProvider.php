<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TicketServiceProvider extends ServiceProvider
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
