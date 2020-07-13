<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceRequest;
use App\Http\Requests\ServiceActionRequest;
use App\Service;
use App\Http\Controllers\User\TicketController;

class ServiceController extends Controller
{
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

        return Service::with('priority')
                ->where('id', $serviceId)->first();

    }

    public function index($serviceId){

        $ticketId = Service::where('id', $serviceId)->first()->ticket_id;

        return view('user.service-details')->with(TicketController::details($ticketId));

    }

}
