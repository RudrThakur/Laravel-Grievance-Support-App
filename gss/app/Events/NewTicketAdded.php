<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewTicketAdded
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $newTicket;

    /**
     * Create a new event instance.
     *
     * @param $newTicket
     */
    public function __construct($newTicket)
    {

        $this->newTicket = $newTicket;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        //
    }
}
