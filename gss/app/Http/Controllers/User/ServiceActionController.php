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
    public function create(ServiceActionRequest $request)
    {

        $request->persist();

        session()->flash('message', 'Service Action Was Successful');

        return redirect()->back();
    }

    public function index($serviceActionId)
    {

        $serviceAction = ServiceAction::where('id', $serviceActionId)
            ->first();

        $service = Service::where('id', $serviceAction->service_id)
            ->first();

        return view('user.service-action-details', [
            'serviceAction' => $serviceAction,
            'service' => $service,
        ]);

    }
}
