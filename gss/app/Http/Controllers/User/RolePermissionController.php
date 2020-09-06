<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;


class RolePermissionController extends Controller
{
   
   public function create($roleId){
    
    $role = Role::where('id', $roleId)->first();

    $role->permissions()->sync(request('role_permissions'), false);

    session()->flash('message','Role Permissions Updated Successfully');

    return redirect()->to('/manage-roles');

    }   

   public function destroy($roleId, $permissionId){

        $role = Role::where('id', $roleId)->first();

        $role->permissions()->detach($permissionId);

        session()->flash('message','Role Permission Updated');

        return redirect()->to('/manage-roles');

    }



}
