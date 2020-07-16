<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ServiceActionNotificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $serviceAction;
    public $serviceActionAuthorities;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($serviceAction, $serviceActionAuthorities)
    {
        $this->serviceAction = $serviceAction;
        $this->serviceActionAuthorities = $serviceActionAuthorities;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.service-action-notification');
    }
}
