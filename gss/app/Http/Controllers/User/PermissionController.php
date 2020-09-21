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

        session()->flash('message', 'The Permission has been Created');

        return redirect()->to('/manage-permissions');

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

        session()->flash('message','Permission Has Been Deleted');

        return redirect()->to('/manage-permissions');

    }
}
