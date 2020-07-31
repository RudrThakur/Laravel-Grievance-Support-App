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

        session()->flash('message', 'The Permission has been Created');

        return redirect()->to('/manage-permissions');

    }

    public function all(){

        $permissions = $this->allPermissions();

        return view('user.manage-permissions',

        [
            'permissions' => $permissions,
        ]);

    }
}
