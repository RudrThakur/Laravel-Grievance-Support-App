<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\ServiceAction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Service;
use App\Ticket;

class TicketController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');
    }

    public function all()
    {

        $tickets = new Ticket;

        $queries = [];

        $columns = [
            'type_id',
            'status_id',
        ];

        foreach ($columns as $column) {
            if (request()->has($column)) {
                $tickets = $tickets->where($column, request($column));
                $queries[$column] = request($column);
            }
        }

        if (request()->has('user_name') && request('user_name') != '') {

            $userIds = User::where('name', 'like', '%' . request('user_name') . '%')->get();

            $tickets = $tickets->whereIn('user_id', $userIds);
        }

        if(request()->has('user_id')){

            $tickets = $tickets->where('user_id', request('user_id'));

        }

        $tickets = $tickets->with('authority')
            ->with('user')
            ->with('status')
            ->paginate(10)
            ->appends($queries);

        return view('user.tickets', ['tickets' => $tickets]);

    }

    public function index($ticketId)
    {
        $ticket = Ticket::with('authority')
            ->with('user')
            ->with('status')
            ->with('type')
            ->where('id', $ticketId)
            ->firstOrFail();

        return view('user.ticket-details', ['ticket' => $ticket]);

    }

    public static function detail($ticketId)
    {

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

    public static function show($ticketId)
    {

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
