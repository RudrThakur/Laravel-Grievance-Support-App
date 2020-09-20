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

    return redirect()->to('/manage-roles')->with('toast_success', 'Role Permissions Updated Successfully');

    }   

   public function destroy($roleId, $permissionId){

        $role = Role::where('id', $roleId)->first();

        $role->permissions()->detach($permissionId);

        return redirect()->to('/manage-roles')->with('toast_success', 'Role Permissions Updated');

    }



}
