<?php

namespace App\Http\Controllers\User;

use App\Authority;
use App\Http\Controllers\Controller;
use App\ServiceAction;
use Illuminate\Http\Request;

class ServiceApprovalController extends Controller
{
    public function create($serviceId)
    {

        request()->validate([
           'approval' => 'required',
           'authority_remarks' => 'required'
        ],
        [
            'approval.required' => 'Please select approve/deny',
            'authority_remarks.required' => 'The message field is required'
        ]);

        $authority = Authority::where('id', auth()->user()->roles->first()->id)->first();

        $serviceAction = ServiceAction::where('service_id', $serviceId)
            ->first();

        $serviceAction->authorities()
            ->updateExistingPivot($authority->id, ['approved' => request('approval')]);

        session()->flash('message', 'Your Action Was Successful');

        return redirect()->back();

    }
}
