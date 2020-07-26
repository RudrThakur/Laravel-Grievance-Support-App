<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\ServiceRepositoryInterface;
use App\Http\Requests\ServiceRequest;
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

    public function index($serviceId, $ticketId){

        if($serviceId && $ticketId){
            $service = $this->serviceRepositoryInterface->findByServiceIdAndTicketId($serviceId, $ticketId);
        }
        else if($serviceId){
            $service = $this->serviceRepositoryInterface->findByServiceId($serviceId);
        }

        else
        {
            $service = $this->serviceRepositoryInterface->findByTicketId($ticketId);
        }

        $ticket = Ticket::where('id', $service->ticket_id)->firstOrFail();
        $serviceAction = ServiceAction::where('service_id', $service->id)->first();

        return view('user.service-details', [
                                                    'service' => $service,
                                                    'ticket' => $ticket,
                                                    'serviceAction' => $serviceAction ? $serviceAction : null,

                                                    ]);

    }

}
