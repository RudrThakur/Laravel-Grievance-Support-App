<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\ServiceRepositoryInterface;
use App\Http\Requests\ServiceRequest;
use App\Http\Requests\ServiceActionRequest;
use App\Service;

class ServiceController extends Controller
{

    private  $serviceRepositoryInterface;

    public function __construct(ServiceRepositoryInterface $serviceRepositoryInterface){

        $this->middleware('auth');

        $this->serviceRepositoryInterface = $serviceRepositoryInterface;

    }

    public function create(){
        return view('user.service');
    }

    public function store(ServiceRequest $request){

        $request->persist();

        session()->flash('message', 'Your Service Request Has Been Submitted');

        return redirect()->to('/tickets');

    }

    public function action(ServiceActionRequest $request){

        $request->persist();

    }

    public function details($serviceId){

        return $this->serviceRepositoryInterface->findById($serviceId);

    }

    public function index($serviceId){

        $ticketId = Service::where('id', $serviceId)->first()->ticket_id;

        return view('user.service-details')->with(TicketController::details($ticketId));

    }

}
