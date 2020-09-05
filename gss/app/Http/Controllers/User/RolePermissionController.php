<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;


class RolePermissionController extends Controller
{
    //
    public function destroy($roleId, $permissionId){

        $role = Role::where('id', $roleId)->first();

        $role->permissions()->detach($permissionId);

        session()->flash('message','Role Permission Updated');

        return redirect()->to('/manage-roles');

    }

}
