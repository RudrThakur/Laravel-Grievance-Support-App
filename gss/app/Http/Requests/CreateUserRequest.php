<?php

namespace App\Http\Requests;

use App\Permission;
use App\Permissions\HasPermissionsTrait;
use App\User;
use App\UsersPermission;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{

    use HasPermissionsTrait;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_role' => 'required',
            'user_name' => 'required',
            'user_email' => 'required',
            'user_password' => 'required',
            'user_permissions' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'user_role.required' => 'The role field is required',
            'user_name.required' => 'The name field is required',
            'user_email.required' => 'The email field is required',
            'user_password.required' => 'The password field is required',
            'user_permissions.required' => 'At least one permission is required',
        ];
    }

    public function persist()
    {

        $user = new User();

        $user->name = $this->user_name;
        $user->email = $this->user_email;
        $user->password = $this->user_password;

        $user->save();

        $user->roles()->attach($this->user_role);

        foreach ($user->roles as $role) {

            if ($role->name == 'Admin') {// Grant All Permissions to Admin

                $permissions = Permission::get()->pluck('id');

                foreach ($permissions as $permission) {

                    $userPermissions = new UsersPermission();// Set User Permissions

                    $userPermissions->user_id = $user->id;

                    $userPermissions->permission_id = $permission;

                    $userPermissions->save();

                }
            } else {

                foreach ($this->user_permissions as $permission) {

                    $userPermissions = new UsersPermission();// Set User Permissions

                    $userPermissions->user_id = $user->id;

                    $userPermissions->permission_id = $permission;

                    $userPermissions->save();

                }

            }
        }
    }
}
