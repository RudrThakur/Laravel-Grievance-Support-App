<?php

namespace App\Repositories;

interface ServiceRepositoryInterface
{
    public function all();

    public function findByServiceId($serviceId);

    public function findByTicketId($ticketId);

    public function findByServiceIdAndTicketId($serviceId, $ticketId);

    public function findByCategory($category);

    public function findBySubCategory($category, $subcategory);
}
