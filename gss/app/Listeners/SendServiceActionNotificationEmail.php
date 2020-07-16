<?php

namespace App\Listeners;

use App\Events\ServiceActionEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\ServiceActionNotificationEmail;

class SendServiceActionNotificationEmail
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
     * @param  ServiceActionEvent  $event
     * @return void
     */
    public function handle(ServiceActionEvent $event)
    {
        Mail::to('rudrakshacmkt777@gmail.com')->send(
            new ServiceActionNotificationEmail($event->serviceAction, $event->serviceActionAuthorities)
        );
    }
}
