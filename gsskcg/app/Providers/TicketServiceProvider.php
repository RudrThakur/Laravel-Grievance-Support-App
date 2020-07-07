<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Ticket;

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

        view()->composer(['user.active-tickets', 'admin.tickets'], function($view){

            $view->with(
                [
                'tickets' => Ticket::all()
                ]
            );

        });
    }
}
