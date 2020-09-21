<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePermissionRequest;
use App\Permissions\HasPermissionsTrait;
use Illuminate\Http\Request;
use App\Permission;
use App\Role;
use App\User;

class PermissionController extends Controller
{

    use HasPermissionsTrait;

    public function index(){

        if (auth()->user()->can('manage-permissions')){


            return view('user.create-permission');
        }else{
            return view('user.permission-error-page');
        }

    }

    public function create(CreatePermissionRequest $request){

        $request->persist();

        return redirect()->to('/manage-permissions')->with('toast_success', 'The Permission has been Created');

    }

    public function all(){

        if(auth()->user()->can('manage-permissions')){

            $permissions = $this->allPermissions();

            return view('user.manage-permissions',

                [
                    'permissions' => $permissions,
                ]);
        }else{
            return view('user.permission-error-page');
        }

    }

    public function destroy($permissionId){

        $permission = Permission::where('id',$permissionId)->first();
        
        $permission->delete();

        return redirect()->to('/manage-permissions')->with('toast_success', 'The Permission has been Deleted');;

    }
}
