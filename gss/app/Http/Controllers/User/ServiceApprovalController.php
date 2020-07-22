<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\ServiceAction;
use Illuminate\Http\Request;

class ServiceApprovalController extends Controller
{
       public function create($action, $serviceActionId, $authorityId){

        $serviceAction = ServiceAction::where('id', $serviceActionId)
                                      ->firstOrFail();

        $updatePivot = $serviceAction->authorities()
                        ->updateExistingPivot($authorityId, ['approved' => $action]);

        if($updatePivot){
            return 'Approved';
        }
        else{
            return 'Failed';
        }
    }
}
