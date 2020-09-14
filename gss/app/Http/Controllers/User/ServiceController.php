<?php

namespace App\Http\Controllers\User;

use App\Authority;
use App\Http\Controllers\Controller;
use App\Repositories\ServiceActionsAuthorityRepositoryInterface;
use App\Repositories\ServiceRepositoryInterface;
use App\Http\Requests\ServiceRequest;
use App\Repositories\TicketRepositoryInterface;
use App\ServiceAction;


class ServiceController extends Controller
{

    private $serviceRepositoryInterface;
    private $ticketRepositoryInterface;
    private $serviceActionsAuthorityRepositoryInterface;

    /**
     *
     * @param ServiceRepositoryInterface $serviceRepositoryInterface
     * @param TicketRepositoryInterface $ticketRepositoryInterface
     * @param ServiceActionsAuthorityRepositoryInterface $serviceActionsAuthorityRepositoryInterface
     */


    public function __construct(ServiceRepositoryInterface $serviceRepositoryInterface,
                                TicketRepositoryInterface $ticketRepositoryInterface,
                                ServiceActionsAuthorityRepositoryInterface $serviceActionsAuthorityRepositoryInterface
    )
    {

        $this->middleware('auth');

        $this->ticketRepositoryInterface = $ticketRepositoryInterface;

        $this->serviceRepositoryInterface = $serviceRepositoryInterface;

        $this->serviceActionsAuthorityRepositoryInterface = $serviceActionsAuthorityRepositoryInterface;

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

        $permission_ServiceApproval = false;

        $currentUserRoleName = auth()->user()->roles->first()->name;

        $isApproved = false;

        if ($serviceAction) {
            $serviceActionAuthorities = $this->serviceActionsAuthorityRepositoryInterface->getByServiceActionId($serviceAction->id);

            $serviceActionAuthoritiesIds = $serviceActionAuthorities->pluck('authority_id');

            $authorities = Authority::whereIn('id', $serviceActionAuthoritiesIds)->get();

            foreach ($authorities as $authority) {
                if ($authority->name == $currentUserRoleName) {

                    $permission_ServiceApproval = true;

                } else

                    $permission_ServiceApproval = false;
            }
        } else {

            $serviceActionAuthorities = null;
            $authorities = null;
            $permission_ServiceApproval = false;
        }

        return view('user.service-details',

            [
                'service' => $service,
                'ticket' => $ticket,
                'serviceAction' => $serviceAction ? $serviceAction : null,
                'serviceActionAuthorities' => $serviceActionAuthorities ?
                    $serviceActionAuthorities : null,
                'authorities' => $authorities ? $authorities : null,
                'permission_ServiceApproval' => $permission_ServiceApproval ? $permission_ServiceApproval : false,

            ]);

    }

}
