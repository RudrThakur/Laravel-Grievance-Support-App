<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Ticket;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TicketClosed extends Notification
{
    use Queueable;
    private $ticketId;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($ticketId)
    {
        $this->ticketId = $ticketId;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Your ticket with ID : #'.$this->ticketId.' has been closed . Please share your valuable feedback')
            ->action('Give Feedback', url('/ticket-feedback'))
            ->line('Thanks');
    }
    
    public function toDatabase($notifiable)
    {
        return [
            "ticketId" => $this->ticketId,
            "type" => "ticket-closed"
        ];
    } 

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
