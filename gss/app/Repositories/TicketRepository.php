<?php


namespace App\Repositories;

use App\Ticket;

class TicketRepository implements TicketRepositoryInterface
{
    public function all(){

        return Ticket::all();

    }

    public function findById($ticketId){

        return Ticket::where('id', $ticketId)->get();

    }

}
