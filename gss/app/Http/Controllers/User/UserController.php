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

class UserController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

    }

    public function index()
    {

        $roles = Role::all();

        $permissions = Permission::all();

        return view('user.create-user',

            [
                'roles' => $roles,
                'permissions' => $permissions,
            ]);

    }

    public function create(CreateUserRequest $request)
    {

        $request->persist();

        session()->flash('message', 'The User Has Been Created');

        return redirect()->to('/manage-users');

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
            }
        } catch (Throwable $exception) {
            return array(
                'status' => false,
                'message' => 'Some Exception Occurred',
                'errors' => $exception
            );
        }

    }
}
