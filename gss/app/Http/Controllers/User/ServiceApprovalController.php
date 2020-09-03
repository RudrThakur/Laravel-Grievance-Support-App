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

        $authority = Authority::where('name', auth()->user()->roles->first()->name)->first();
       
        $serviceAction = ServiceAction::where('service_id', $serviceId)
            ->first();

        $serviceApproval = $serviceAction->authorities()
            ->updateExistingPivot($authority->id, ['approved' => request('approval'), 'remarks' => request('authority_remarks')]);

        session()->flash('message', 'Your Action Was Successful');

        return redirect()->back();

    }
}
