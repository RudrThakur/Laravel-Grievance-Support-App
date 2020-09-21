<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Ticket;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TicketStatusChange extends Notification
{
    use Queueable;
    private $ticketId;
    private $ticketStatus;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($ticketId,$ticketStatus)
    {
        $this->ticketId = $ticketId;
        $this->ticketStatus = $ticketStatus;
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
                    ->line('Your ticket with ID : #'.$this->ticketId.' status has been changed to '.$this->ticketStatus)
                    ->action('View more', url('/'))
                    ->line('Thanks');
    }

    public function toDatabase($notifiable)
    {
        return [
            "ticketId" => $this->ticketId,
            "ticketStatus" => $this->ticketStatus,
            "type" => "ticket-status-change"
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
            
        ];
    }
}
