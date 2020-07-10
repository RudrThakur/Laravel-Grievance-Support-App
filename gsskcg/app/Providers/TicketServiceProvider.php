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

        view()->composer(['user.active-tickets'], function($view){

            $view->with(
                [
                'tickets' => Ticket::with('authority')
                                    ->with('user')
                                    ->with('status')
                                    ->with('worker')
                                    ->with('priority')
                                    ->where('user_id', auth()->id())
                                    ->get(),
                ]
            );

        });

        view()->composer(['admin.tickets'], function($view){

            $view->with(
                [
                'tickets' => Ticket::with('authority')
                                    ->with('user')
                                    ->with('status')
                                    ->with('worker')
                                    ->with('priority')
                                    ->get(),
                ]
            );

        });
    }
}
