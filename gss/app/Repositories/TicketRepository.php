<?php


namespace App\Repositories;

use App\Ticket;

class TicketRepository implements TicketRepositoryInterface
{
    public function all()
    {

        return Ticket::all();

    }

    public function findById($ticketId)
    {

        return Ticket::with('user')
            ->with('type')
            ->with('authority')
            ->with('status')
            ->where('id', $ticketId)
            ->first();

    }

}
