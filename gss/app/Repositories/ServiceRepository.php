<?php


namespace App\Repositories;


use App\Service;

class ServiceRepository implements ServiceRepositoryInterface
{
    public function all(){

        return Service::all();

    }

    public function findById($serviceId){

        return Service::where('id', $serviceId)->firstOrFail();

    }

    public function findByCategory($category){

        return Service::where('category', $category)->get();

    }

    public function findBySubCategory($category, $subcategory){

        return Service::where('category', $category)
                        ->where('subcategory', $subcategory)
                        ->get();

    }
}
