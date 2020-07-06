<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Service;
use App\Ticket;

class TicketController extends Controller
{

    public function __construct(){

        $this->middleware('auth');
    }
    
    public function index(){
        
        return view('user.index');

    }

    public function activeTickets(){

        return view('user.active-tickets');
        
    }

    public function details(Request $request){

        return ['service' => Service::where('ticket_id', $request->ticketId)->first(),
                'ticket' => Ticket::with('user')->where('id', $request->ticketId)->first()];

    }
}
