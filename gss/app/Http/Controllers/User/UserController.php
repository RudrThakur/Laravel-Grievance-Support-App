<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Permission;
use App\Role;
use App\User;
use App\UsersPermission;
use Illuminate\Http\Request;
use Throwable;
use Illuminate\Database\QueryException;

class UserController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

    }

    public function index()
    {

        if(auth()->user()->can('create-user')){

            $roles = Role::all();

            $permissions = Permission::all();

            return view('user.create-user',

                [
                    'roles' => $roles,
                    'permissions' => $permissions,
                ]);
        }else{
            return view('user.permission-error-page');
        }

    }

    public function create(CreateUserRequest $request)
    {

        try{

            $request->persist();
            return redirect()->to('/manage-users')->with('toast_success', 'The User Has Been Created Successfully');
        }catch(QueryException $ex){ 
            return redirect()->back()->withErrors([
                'message' => 'Account Already Exists'
            ]);
        }

    }

    public function all()
    {

        if (auth()->user()->can('manage-users')) {
            $users = User::with('permissions')->paginate(5);

            $allPermissions = Permission::all();

            return view('user.manage-users',

                [

                    'users' => $users,
                    'allPermissions' => $allPermissions,

                ]);
        }

        else{

            return view('user.permission-error-page');

        }

    }

    public function destroy($userId)
    {

        try {

         if(auth()->user()->can('delete-user')){

            if ($userId == auth()->user()->id) {
                return array(
                    'status' => false,
                    'message' => 'To Delete Your Account Go to Account Settings',
                    'errors' => 'You Have to use the "Delete Account" Option in Account Settings to
                    Delete your Account'
                );
                } else {
                $user = User::find($userId);

                $user->delete();

                return array(
                    'status' => true,
                    'message' => 'User Has Been Deleted Successfully',
                    'errors' => ''
                );
            }}
            else{
               return array(
                'status' => false,
                'message' => 'You do not have permission for this action' ,
                'errors' => 'Permission Error'
            );
           } }catch (Throwable $exception) {
            return array(
                'status' => false,
                'message' => 'Some Exception Occurred',
                'errors' => $exception
            );
        }

    }


    public function setActive($userId,$active){

        try{

            $user = User::where('id',$userId)->first();
            $user->update([
                'is_active' => $active
            ]);





            return ['status'=>true,'message'=>'Status Changed Successfully'];

        }catch(Throwable $exception){
            return back()->withErrors([
                'message' => 'User does not Exists'
            ]);;
        }


    }
}
