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
}
