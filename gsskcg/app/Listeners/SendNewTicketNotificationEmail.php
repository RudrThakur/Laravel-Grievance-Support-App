<?php

namespace App\Listeners;

use App\Events\NewTicketAdded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewTicketNotificationEmail;

class SendNewTicketNotificationEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewTicketAdded  $event
     * @return void
     */
    public function handle(NewTicketAdded $event)
    {
        Mail::to('rudrakshacmkt777@gmail.com')->send(
            new NewTicketNotificationEmail($event->newTicket)
        );
    }
}
