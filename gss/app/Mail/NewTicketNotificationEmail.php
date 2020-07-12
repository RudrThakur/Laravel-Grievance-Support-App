<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewTicketNotificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $newTicket;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($newTicket)
    {

        $this->newTicket = $newTicket;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.newticket-notification');
    }
}
