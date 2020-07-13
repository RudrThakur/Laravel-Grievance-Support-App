<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Service;
use App\Ticket;

class TicketController extends Controller
{

    public function __construct(){

        $this->middleware('auth');
    }
    
    public function all(){

        return view('user.tickets');
        
    }

    public static function details($ticketId){

        return ['service' => Service::with('priority')
                                    ->where('ticket_id', $ticketId)->first(),
                                    
                'ticket' => Ticket::with('authority')
                                    ->with('user')
                                    ->with('status')
                                    ->where('id', $ticketId)
                                    ->first(),
                ];

    }
}
