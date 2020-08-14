<?php

namespace App\Listeners;

use App\Events\NewTicketAdded;
use App\Notifications\TicketRegistration;
use App\User;
use App\UsersRole;
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
     * @param NewTicketAdded $event
     * @return void
     */
    public function handle(NewTicketAdded $event)
    {

        $when = now()->addSeconds(10);

        $admins = UsersRole::where('role_id', 1)->get()->pluck('user_id');

        $currentUser = auth()->user()->id;

        $recipients = User::where('id', $currentUser)
            ->orWhereIn('id', $admins)
            ->get();

        foreach ($recipients as $recipient) {
            $recipient->notify((new TicketRegistration($event->ticket, $recipient))->delay($when));
        }

    }
}
