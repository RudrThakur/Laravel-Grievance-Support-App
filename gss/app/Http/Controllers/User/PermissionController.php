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

        return view('user.create-permission');

    }

    public function create(CreatePermissionRequest $request){

        $request->persist();

        return redirect()->to('/manage-permissions')->with('toast_success', 'The Permission has been Created');

    }

    public function all(){

        $permissions = $this->allPermissions();

        return view('user.manage-permissions',

        [
            'permissions' => $permissions,
        ]);

    }

    public function destroy($permissionId){

        $permission = Permission::where('id',$permissionId)->first();
        
        $permission->delete();

        return redirect()->to('/manage-permissions')->with('toast_success', 'The Permission has been Deleted');;

    }
}
