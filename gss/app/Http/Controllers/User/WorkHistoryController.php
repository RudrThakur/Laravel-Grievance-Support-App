<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Service;
use App\ServiceAction;
use App\User;
use App\Ticket;
use App\Notifications\JobAssign;
use Exception;
use App\Algorithms\Hungarian;
use App\Worker;

class WorkHistoryController extends Controller
{
    public function store($serviceActionId)
    {

        request()->validate([
            'auto_assign_worker' => 'required_without:worker_id',
            'worker_id' => 'required_without:auto_assign_worker',
            'eta' => 'required_with:worker_id',
            'adminremarks' => 'required'

        ], [
            'auto_assign_worker.required_without' => 'Please check Auto Assign if you intend to auto assign job to a worker',
            'worker_id.required_without' => 'worker field is required if not auto assigned',
            'eta.required_with' => 'eta field is required is Worker is assigned manually',
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


            if (!request('auto_assign_worker')) {

                $serviceAction->update([
                    'worker_id' => request('worker_id'),
                    'eta' => request('eta'),
                    'adminremarks' => request('adminremarks')
                ]);

                $worker = Worker::where('user_id', $serviceAction->worker_id)->first();

                $worker->update([

                    'service_id' => $service->id,
                    'service_actions_id' => $serviceAction->id,
                    'available' => 0
                ]);

            } else { // Auto Assign Worker


                $workers = Worker::where('available', 1)->limit(6)->get();

                $workerTATs = $workers->map(function ($item, $key) {

                    return [
                        $item->tat_Painting,
                        $item->tat_Plumbing,
                        $item->tat_HouseKeeping,
                        $item->tat_Airconditioner,
                        $item->tat_Electrical,
                        $item->tat_Interior
                    ];
                });

                $hungarian = new Hungarian($workerTATs->toArray());

                $hungarianSolution = $hungarian->solve();

                // Set the value of Solved TAT

                if ($service->category == 'Painting') {
                    $solvedTAT = $hungarianSolution[0];
                } else if ($service->category == 'Plumbing') {

                    $solvedTAT = $hungarianSolution[1];
                } else if ($service->category == 'HouseKeeping') {
                    $solvedTAT = $hungarianSolution[2];
                } else if ($service->category == 'Airconditioner') {

                    $solvedTAT = $hungarianSolution[3];
                } else if ($service->category == 'Electrical') {
                    $solvedTAT = $hungarianSolution[4];
                } else {
                    $solvedTAT = $hungarianSolution[5];
                }

                $serviceAction->update([
                    'worker_id' => $workers[$solvedTAT]->user_id,
                    'eta' => $workers[$solvedTAT]->avg_tat,
                    'adminremarks' => request('adminremarks')
                ]);

                $worker = Worker::where('user_id', $serviceAction->worker_id)->first();

                $worker->update([
                    'service_id' => $service->id,
                    'service_actions_id' => $serviceAction->id,
                    'available' => 0
                ]);

            }


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
