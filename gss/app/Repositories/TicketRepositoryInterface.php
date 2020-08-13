<?php

namespace App\Repositories;

interface TicketRepositoryInterface
{
    public function all();

    public function findById($ticketId);
}
