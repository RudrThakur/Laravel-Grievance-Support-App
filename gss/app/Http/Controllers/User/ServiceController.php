<?php

namespace App\Http\Controllers\User;

use App\Authority;
use App\Http\Controllers\Controller;
use App\Repositories\ServiceActionsAuthorityRepositoryInterface;
use App\Repositories\ServiceRepositoryInterface;
use App\Http\Requests\ServiceRequest;
use App\ServiceAction;
use App\Ticket;


class ServiceController extends Controller
{

    private $serviceRepositoryInterface;

    private $serviceActionsAuthorityRepositoryInterface;

    /**
     *
     * @param ServiceRepositoryInterface $serviceRepositoryInterface
     * @param ServiceActionsAuthorityRepositoryInterface $serviceActionsAuthorityRepositoryInterface
     */


    public function __construct(ServiceRepositoryInterface $serviceRepositoryInterface,
        ServiceActionsAuthorityRepositoryInterface $serviceActionsAuthorityRepositoryInterface
    )
    {

        $this->middleware('auth');

        $this->serviceRepositoryInterface = $serviceRepositoryInterface;

        $this->serviceActionsAuthorityRepositoryInterface = $serviceActionsAuthorityRepositoryInterface;

    }

    public function create()
    {
        if (auth()->user()->can('create-ticket')){
            return view('user.service');
        }
        else{
            return view('user.permission-error-page');
        }
    }

    public function store(ServiceRequest $request)
    {

        $request->persist();

        // session()->flash('message', 'Your Service Request Has Been Submitted');

        return redirect()->to('/tickets')->with('toast_success', 'Your Service Request Has Been Submitted');
        // else{
        //     return back()->with('toast_error', 'Error While submitting form');
        // }

    }

    public function index($serviceId)
    {
        $service = $this->serviceRepositoryInterface->findById($serviceId);

        $serviceAction = ServiceAction::where('service_id', $service->id)->first();

        $isClosed = Ticket::where('service_id', $serviceId)->first()->status_id == 4;

        if ($serviceAction) {
            $serviceActionAuthorities = $this->serviceActionsAuthorityRepositoryInterface->getByServiceActionId($serviceAction->id);

            $serviceActionAuthoritiesIds = $serviceActionAuthorities->pluck('authority_id');

            $authorities = Authority::whereIn('id', $serviceActionAuthoritiesIds)->get();

            
            if(!(auth()->user()->roles->first()->name == "Faculty")){ $isApprovedByCurrentUser = $this->serviceActionsAuthorityRepositoryInterface->checkIfApprovedByAuthorityName($serviceAction->id,
                auth()->user()->roles->first()->name);
            }
            else{
                $isApprovedByCurrentUser = null;
            }  

            $pendingApprovals = $this->serviceActionsAuthorityRepositoryInterface->getUnApprovedByServiceActionId($serviceAction->id);

            if(!(auth()->user()->roles->first()->name == "Faculty")){$isApprovalRequiredByCurrentUser = $this->serviceActionsAuthorityRepositoryInterface->checkIfApprovalRequiredByAuthorityName($serviceAction->id,
                auth()->user()->roles->first()->name);
            }
            else{
                $isApprovalRequiredByCurrentUser = null;
             }
           
        } else {

            $serviceActionAuthorities = null;
            $authorities = null;
            $pendingApprovals = null;
            $isApprovedByCurrentUser = null;
            $isApprovalRequiredByCurrentUser = null;

        }

        return view('user.service-details',

            [
                'service' => $service,
                'serviceAction' => $serviceAction,
                'serviceActionAuthorities' => $serviceActionAuthorities,
                'authorities' => $authorities,
                'isApprovedByCurrentUser' => $isApprovedByCurrentUser,
                'pendingApprovals' => $pendingApprovals,
                'isApprovalRequiredByCurrentUser' => $isApprovalRequiredByCurrentUser,
                'isClosed' => $isClosed
            ]);

    }

}
