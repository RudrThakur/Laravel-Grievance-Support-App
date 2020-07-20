<?php

namespace App\Repositories;

interface ServiceRepositoryInterface
{
    public function all();

    public function findById($serviceId);

    public function findByCategory($category);

    public function findBySubCategory($category, $subcategory);
}
