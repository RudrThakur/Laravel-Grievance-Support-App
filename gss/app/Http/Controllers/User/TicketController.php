<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\TicketRepositoryInterface;
use App\ServiceAction;
use App\TicketsFeedback;
use App\User;
use App\Worker;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Service;
use App\Ticket;
use Exception;


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
        try {
            $trackTicket = [
                'ticketRaised' => '',
                'adminResponded' => '',
                'workStarted' => '',
                'workCompleted' => '',
                'ticketClosed' => '',
                'feedbackRecorded' => ''
            ];


            $ticket = $this->ticketRepositoryInterface->findById($ticketId);

            $ticketFeedback = TicketsFeedback::where('ticket_id', $ticket->id)->first();

            if ($ticket->type_id == 1) { // Service

                $serviceAction = ServiceAction::where('service_id', $ticket->service_id)->first();

                $trackTicket['ticketRaised'] = $ticket->created_at;
                $trackTicket['adminResponded'] = $serviceAction ? $serviceAction->created_at : 'No Data Available';
                $trackTicket['workStarted'] = ($serviceAction ? ($serviceAction->worker_id ? $serviceAction->updated_at : 'No Data Available')
                    : 'No Data Available');
                $trackTicket['workCompleted'] = ($serviceAction ? ($serviceAction->tat ? $serviceAction->updated_at : 'No Data Available') : 'No Data Available');
                $trackTicket['ticketClosed'] = $ticket->status_id == 4 ? $ticket->updated_at : 'No Data Available';
                $trackTicket['feedbackRecorded'] = $ticketFeedback ? $ticketFeedback->created_at : 'No Data Available';
            }


            return view('user.ticket-details',
                [
                    'ticket' => $ticket,
                    'trackTicket' => $trackTicket,
                ]

            );
        } catch (Exception $ex) {

            return back()->withErrors([
                'message' => 'Ticket does not exists'
            ]);
        }

    }

    public function destroy($ticketId)
    {
        try {
            $ticket = Ticket::find($ticketId);
            $ticket->delete();

        } catch (Exception $ex) {

            return back()->withErrors([
                'message' => 'Ticket does not exists'
            ]);
        }

    }

    public function find($ticketId)
    {

        $ticket = $this->ticketRepositoryInterface->findById($ticketId);

        return $ticket;

    }

    public function close($ticketId)
    {

        $ticket = $this->ticketRepositoryInterface->findById($ticketId);

        if ($ticket->type_id == 1) { // Service

            $service = Service::where('ticket_id', $ticketId)->first();

            $serviceAction = ServiceAction::where('service_id', $service->id)->first();

            $serviceAction->update(['tat' => (Carbon::now()->diffInDays($serviceAction->created_at, true) == 0 ?
                1 : Carbon::now()->diffInDays($serviceAction->created_at, true))]);

            $worker = Worker::where('service_id', $service->id)->first();


            // Average TAT Calculation

            $workerServiceActions = ServiceAction::where('worker_id', $worker->user_id)
                ->where('tat', '!=', null)->get(); // Get All the completed work tat of the worker

            $workerServiceActionsTotalTAT = $workerServiceActions->sum('tat'); // Sum all tat

            $worker->update([
                'available' => 1,
                'num_workingdays' => $worker->num_workingdays ? $worker->num_workingdays + $service->tat : $service->tat,
                'avg_tat' => $workerServiceActionsTotalTAT / $workerServiceActions->count(),

            ]);
        }

        $ticket->update(['status_id' => 4]);

        session()->flash('message', 'Ticket Closed Successfully');

        return redirect()->to('/ticket-details/' . $ticketId);
    }
}
