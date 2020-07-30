<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Permission;
use App\Role;
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
}
