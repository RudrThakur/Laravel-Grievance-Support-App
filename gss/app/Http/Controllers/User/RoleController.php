<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRoleRequest;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){

        $permissions = Permission::all();

        return view('user.create-role',
        [
            'permissions' => $permissions,
        ]);

    }

    public function create(CreateRoleRequest $request){

        $request->persist();

        session()->flash('message', 'The Role has been Created');

        return redirect()->to('/manage-roles');
    }

    public function all(){

        $roles = Role::with('permissions')
                        ->get();

        return view('user.manage-roles',

        [
            'roles' => $roles,
        ]);

    }
}
