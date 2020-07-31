<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use App\UsersPermission;
use Illuminate\Http\Request;

class UserPermissionController extends Controller
{
    public function destroy($userId, $permissionId){

        $user = User::where('id', $userId)->first();

        $user->permissions()->detach($permissionId);

        return 'User Permission Deleted Successfully';
    }
}
