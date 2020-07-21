<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\ServiceRepositoryInterface;
use App\Http\Requests\ServiceRequest;
use App\Http\Requests\ServiceActionRequest;
use App\Ticket;
use App\ServiceAction;

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

    public function index($serviceId){

        $service = $this->serviceRepositoryInterface->findById($serviceId);

        $ticket = Ticket::where('id', $service->ticket_id)->firstOrFail();

        $serviceAction = ServiceAction::where('service_id', $serviceId)->firstOrFail();

        return view('user.service-details', [
                                                    'service' => $service,
                                                    'ticket' => $ticket,
                                                    'serviceAction' => $serviceAction,

                                                    ]);

    }

}
