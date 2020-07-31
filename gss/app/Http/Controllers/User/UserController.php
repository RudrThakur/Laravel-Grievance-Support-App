<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Permission;
use App\Role;
use App\User;
use App\UsersPermission;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(){

        $this->middleware('auth');

    }

    public function index(){

        $roles = Role::all();

        $permissions = Permission::all();

        return view('user.create-user',

        [
            'roles' => $roles,
            'permissions' => $permissions,
        ]);

    }

    public function create(CreateUserRequest $request){

        $request->persist();

        session()->flash('message', 'The User Has Been Created');

        return redirect()->to('/manage-users');

    }

    public function all(){

        $users = User::with('permissions')->paginate(5);

        $allPermissions = Permission::all();

        return view('user.manage-users',

        [

            'users' => $users,
            'allPermissions' => $allPermissions,

        ]);

    }
}
