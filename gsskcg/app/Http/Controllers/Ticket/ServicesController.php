<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\ServiceRequest;
use App\Http\Requests\ServiceActionRequest;

class ServicesController extends Controller
{
    public function create(){
        return view('user.services');
    }

    public function store(ServiceRequest $request){

        $request->persist();

        session()->flash('message', 'Your Service Request Has Been Submitted');

        return redirect()->to('/user/active-tickets');

    }

    public function action(ServiceActionRequest $request){

        $request->persist();

    }
}
