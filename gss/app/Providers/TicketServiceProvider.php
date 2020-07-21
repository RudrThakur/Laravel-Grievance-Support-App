<?php

namespace App\Providers;

use App\Ticket;
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

        view()->composer(['user.tickets'], function($view){

            $view->with(
                [
                    'tickets' => Ticket::with('authority')
                                    ->with('user')
                                    ->with('status')
                                    ->get(),
                ]
            );
        });
    }
}
