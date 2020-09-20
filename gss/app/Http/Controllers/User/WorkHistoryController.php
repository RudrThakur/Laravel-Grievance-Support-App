<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Service;
use App\ServiceAction;
use App\User;
use App\Ticket;
use App\Notifications\JobAssign;
use Exception;
use Illuminate\Http\Request;

class WorkHistoryController extends Controller
{
    public function store($serviceActionId)
    {

        request()->validate([
            'worker_id' => 'required',
            'eta' => 'required',
            'adminremarks' => 'required'

        ], [
            'worker_id.required' => 'worker field is required',
            'eta.required' => 'eta field is required',
            'adminremarks.required' => 'message field is required'
        ]);

        try {

            $serviceAction = ServiceAction::where('id', $serviceActionId)->first();

            $service = Service::where('id', $serviceAction->service_id)->first();

            $ticket = Ticket::where('id', $service->ticket_id)->first();

            $serviceAction->update([
                'worker_id' => request('worker_id'),
                'eta' => request('eta'),
                'adminremarks' => request('adminremarks')
            ]);

            $worker = User::where('id', $serviceAction->worker_id)->first();
            $user = User::where('id',$ticket->user_id)->first();
            $user->notify(new JobAssign($ticket->id,$worker->name));


            // session()->flash('message', 'Worker Assigned');

            return redirect()->to('/service-details/'.$service->id)->with('toast_success','Worker Assigned');

        } catch (Exception $ex) {
            return $ex;
        }
    }
}
