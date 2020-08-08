<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Permission;
use App\RolesPermission;
use App\UsersPermission;
use Illuminate\Http\Request;

use App\User;

class RegisterController extends Controller
{
    public function create()
    {

        return view('user.register');

    }

    public function store()
    {

        $this->validate(request(), [
            'role_id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ],
            [
                'role_id.required' => 'The role field is required',
            ]
        );

        $user = User::create(request(['name', 'email', 'password']));

        $user->roles()->attach(request('role_id'));

        foreach ($user->roles as $role) {

            if ($role->name == 'Admin') {// Grant All Permissions to Admin

                $permissions = Permission::all();

                $user->permissions()->saveMany($permissions);

            }
        }

        auth()->login($user);

        session()->flash('message', 'You Account has been Registered Successfully');

        return redirect()->route('home');

    }

}
