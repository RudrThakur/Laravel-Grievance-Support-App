<?php


namespace App\Repositories;


use App\Service;

class ServiceRepository implements ServiceRepositoryInterface
{
    public function all(){

        return Service::all();

    }

    public function findByServiceId($serviceId){

        return Service::where('id', $serviceId)->first();

    }

    public function findByTicketId($ticketId){

        return Service::where('ticket_id', $ticketId)->first();

    }

     public function findByServiceIdAndTicketId($serviceId, $ticketId){

        return Service::where('id', $serviceId)->where('ticket_id', $ticketId)->first();

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
