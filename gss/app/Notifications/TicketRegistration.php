<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TicketRegistration extends Notification implements ShouldQueue
{
    use Queueable;

    private $ticket;
    private $recipient;

    /**
     * Create a new notification instance.
     *
     * @param $ticket
     * @param $recipient
     */
    public function __construct($ticket, $recipient)
    {
        $this->ticket = $ticket;
        $this->recipient = $recipient;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {

        if ($this->recipient->roles->first()->name == 'Faculty')
            return (new MailMessage)
                ->line('Dear Faculty,')
                ->line('Your Ticket Has Been Registered Successfully.
                    Your Ticket ID is #'.$this->ticket->id)
                ->action('More Info', url('/ticket-details/'.$this->ticket->id))
                ->line('You May Login Into Your GSS Account For More Details!');
        else
            return (new MailMessage)
                ->line('Dear Admin,')
                ->line('A New Ticket Has Been Raised.
                    Ticket ID is #'.$this->ticket->id)
                ->action('More Info', url('/ticket-details/'.$this->ticket->id))
                ->line('You May Login Into Your GSS Account For More Details!');

    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
