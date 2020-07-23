<?php

namespace App\Http\Controllers\User;

use App\Authority;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceActionRequest;
use App\Service;
use App\ServiceAction;
use Illuminate\Http\Request;

class ServiceActionController extends Controller
{
    public function create(ServiceActionRequest $request){//Listening to AJAX Requests

        $request->persist();

    }

    public function index($serviceActionId){

        $serviceAction = ServiceAction::where('id', $serviceActionId)
                                        ->firstOrFail();

        $service = Service::where('id', $serviceAction->service_id)
                            ->firstOrFail();

        return view('user.service-action-details', [
                                                            'serviceAction' => $serviceAction,
                                                            'service' => $service,
        ]);

    }
}