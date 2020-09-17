<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Service;
use App\ServiceAction;
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

            $serviceAction->update([
                'worker_id' => request('worker_id'),
                'eta' => request('eta'),
                'adminremarks' => request('adminremarks')
            ]);

            session()->flash('message', 'Worker Assigned');

            return redirect()->to('/service-details/'.$service->id);

        } catch (Exception $ex) {
            return $ex;
        }
    }
}
