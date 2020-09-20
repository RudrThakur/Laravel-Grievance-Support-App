<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Ticket;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class JobAssign extends Notification
{
    use Queueable;
    private $ticketId;
    private $workerName;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($ticketId,$workerName)
    {
        $this->ticketId = $ticketId;
        $this->workerName = $workerName;
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
        ->line('Worker : '.$this->workerName.' has been aasigned for your ticket with ID : #'.$this->ticketId)
        ->action('View more', url('/'))
        ->line('Thanks');
    }

    public function toDatabase($notifiable)
    {
        return [
            "ticketId" => $this->ticketId,
            "workerName" => $this->workerName,
            "type" => "job-assign"
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
