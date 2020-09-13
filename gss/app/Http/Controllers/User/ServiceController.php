<?php

namespace App\Http\Controllers\User;

use App\Authority;
use App\Http\Controllers\Controller;
use App\Repositories\ServiceRepositoryInterface;
use App\Http\Requests\ServiceRequest;
use App\Repositories\TicketRepositoryInterface;
use App\ServiceActionsAuthority;
use App\Ticket;
use App\ServiceAction;
use PhpOption\None;

class ServiceController extends Controller
{

    private $serviceRepositoryInterface;
    private $ticketRepositoryInterface;

    /**
     *
     * @param ServiceRepositoryInterface $serviceRepositoryInterface
     * @param TicketRepositoryInterface $ticketRepositoryInterface
     */


    public function __construct(ServiceRepositoryInterface $serviceRepositoryInterface,
                                TicketRepositoryInterface $ticketRepositoryInterface)
    {

        $this->middleware('auth');

        $this->ticketRepositoryInterface = $ticketRepositoryInterface;

        $this->serviceRepositoryInterface = $serviceRepositoryInterface;

    }

    public function create()
    {
        return view('user.service');
    }

    public function store(ServiceRequest $request)
    {

        $request->persist();

        session()->flash('message', 'Your Service Request Has Been Submitted');

        return redirect()->to('/tickets');

    }

    public function index($serviceId)
    {
        $service = $this->serviceRepositoryInterface->findById($serviceId);

        $ticket = $this->ticketRepositoryInterface->findById($service->ticket_id);

        $serviceAction = ServiceAction::where('service_id', $service->id)->first();

        if ($serviceAction) {
            $serviceActionAuthorities = ServiceActionsAuthority::where('service_action_id', $serviceAction->id)->get();
            $serviceActionAuthoritiesIds = $serviceActionAuthorities->pluck('authority_id');
            $authorities = Authority::whereIn('id', $serviceActionAuthoritiesIds)->get();

        } else {
            $serviceActionAuthorities = null;
            $authorities = null;
        }

        return view('user.service-details',

            [
                'service' => $service,
                'ticket' => $ticket,
                'serviceAction' => $serviceAction ? $serviceAction : null,
                'serviceActionAuthorities' => $serviceActionAuthorities ?
                    $serviceActionAuthorities : null,
                'authorities' => $authorities ? $authorities : null,

            ]);

    }

}
