<?php

namespace App\Http\ViewComposers;

use App\PermissionInfo;

class PermissionComposer
{

    public function __construct()
    {
      
    }

    public function compose($view)
    {

        $view->with(
        [
            'roleBasedPermissions' => PermissionInfo::orderBy('role_id')->get(),
            'userBasedPermissions' => PermissionInfo::orderBy('user_id')->get(),
        ]
        );
    
    }
}