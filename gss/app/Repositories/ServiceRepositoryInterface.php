<?php

namespace App\Repositories;

interface ServiceRepositoryInterface
{
    public function all();

    public function findById($serviceId);

}
