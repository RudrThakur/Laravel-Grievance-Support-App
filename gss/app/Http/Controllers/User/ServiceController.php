<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceRequest;
use App\Http\Requests\ServiceActionRequest;
use App\Service;

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
                ->where('ticket_id', $serviceId)->first();

    }
}
