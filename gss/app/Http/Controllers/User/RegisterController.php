<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Permission;
use App\RolesPermission;
use App\UsersPermission;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

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
        try{
            $user = User::create(request(['name', 'email', 'password']));

            $user->roles()->attach(request('role_id'));
    
            foreach ($user->roles as $role) {
    
                $permissions = Permission::all();
    
                if ($role->name == 'Admin')// Grant All User Permissions to Admin
                    $user->permissions()->saveMany($permissions);
    
                if ($role->permissions->isEmpty())// Grant All Role Permissions to All Roles
                    $role->permissions()->saveMany($permissions);
            }
            auth()->login($user);
    
            return redirect()->route('home')->with('success', 'You Account has been Registered Successfully');
            }catch(QueryException $ex){ 

            return redirect()->back()->withErrors([
                'message' => 'Account Already Exists'
            ]);
             
           }
        

    }

}
