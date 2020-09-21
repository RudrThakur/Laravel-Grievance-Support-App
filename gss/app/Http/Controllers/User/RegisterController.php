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
    
                if ($role->name == 'Admin')
                // Grant All User Permissions to Admin

                {
                    $user->permissions()->saveMany($permissions);
                
                    if ($role->permissions->isEmpty())// Grant All Role Permissions to All Roles
                    $role->permissions()->saveMany($permissions);
                }elseif ($role->name == 'Registrar') //Grant Permissions to Registrar
                {

                    $registrarPermissions = ['service-approval','manage-tickets','view-dashboard','view-tickets'];
                    $permissionsScoped = Permission::whereIn('slug',$registrarPermissions)->get();

                    $role->permissions()->saveMany($permissionsScoped);
                }elseif ($role->name == 'Faculty') //Grant Permissions to Faculty
                {

                    $facultyPermissions = ['create-ticket','view-tickets','feedback-permission','view-ticket-details','manage-tickets';
                    $permissionsScoped = Permission::whereIn('slug',$facultyPermissions)->get();

                    $role->permissions()->saveMany($permissionsScoped);
                }elseif($role->name == 'Worker')//Grant Permissions to Worker
                {
                    $workerPermissions = ['view-tickets','manage-tickets'];

                    $permissionsScoped = Permission::whereIn('slug',$workerPermissions)->get();

                    $role->permissions()->saveMany($permissionsScoped);

                }
            }
    
            auth()->login($user);
    
            session()->flash('message', 'You Account has been Registered Successfully');
    
            return redirect()->route('home');
            }catch(QueryException $ex){ 

            return redirect()->back()->withErrors([
                'message' => 'Account Already Exists'
            ]);
             
           }
        

    }

}
