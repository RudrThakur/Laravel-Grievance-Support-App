<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\TicketRepositoryInterface;
use App\ServiceAction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Service;
use App\Ticket;

class TicketController extends Controller
{

    private $ticketRepositoryInterface;

    public function __construct(TicketRepositoryInterface $ticketRepositoryInterface)
    {

        $this->ticketRepositoryInterface = $ticketRepositoryInterface;

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

        if (request()->has('user_id') && request('user_id') != '') {

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
        $ticket = $this->ticketRepositoryInterface->findById($ticketId);

        $service = Service::where('ticket_id', $ticketId)->first();

        $service ? $serviceAction = ServiceAction::where('service_id', $service->id)->first() : $serviceAction = null;

        return view('user.ticket-details', ['ticket' => $ticket,
            'service' => $service ? $service : null,
            'serviceAction' => $serviceAction]);

    }

    public function destroy($ticketId)
    {

        $ticket = Ticket::find($ticketId);
        $deleteAction = $ticket->delete();

    }
}
