<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ServiceApprovalEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $serviceAction;
    public $serviceActionAuthorities;
    public $recipient;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($serviceAction, $serviceActionAuthorities, $recipient)
    {

        $this->serviceAction = $serviceAction;
        $this->serviceActionAuthorities = $serviceActionAuthorities;
        $this->recipient = $recipient;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.service-approval');
    }
}
