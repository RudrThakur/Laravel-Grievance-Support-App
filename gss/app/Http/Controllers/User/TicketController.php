<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\ServiceAction;
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

    public function index($ticketId){
         $ticket = Ticket::with('authority')
                                    ->with('user')
                                    ->with('status')
                                    ->with('type')
                                    ->where('id', $ticketId)
                                    ->firstOrFail();

        return view('user.ticket-details', ['ticket' => $ticket]);

    }

    public static function detail($ticketId){

         $ticket = Ticket::with('authority')
                                    ->with('user')
                                    ->with('status')
                                    ->with('type')
                                    ->where('id', $ticketId)
                                    ->firstOrFail();

        $service = Service::with('priority')
                                    ->where('ticket_id', $ticketId)->firstOrFail();

        return ['ticket' => $ticket,
                'service' => $service];
    }

    public static function show($ticketId){

        $ticket = Ticket::with('authority')
                                    ->with('user')
                                    ->with('status')
                                    ->where('id', $ticketId)
                                    ->firstOrFail();

        $service = Service::with('priority')
                                    ->where('ticket_id', $ticketId)->firstOrFail();

        $serviceAction = ServiceAction::with('worker')
                                                ->where('service_id', $service->id)
                                                ->firstOrFail();

        return [

                'service' => $service,

                'ticket' => $ticket,

                'serviceAction' => $serviceAction,

                ];

    }
}
