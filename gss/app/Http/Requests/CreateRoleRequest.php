<?php

namespace App\Http\Requests;

use App\Role;
use App\RolesPermission;
use Illuminate\Foundation\Http\FormRequest;

class CreateRoleRequest extends FormRequest
{
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
            'role_name' => 'required',
            'role_permissions' => 'required',
        ];

    }

    public function messages()
    {
        return [
            'role_name.required' => 'The role field is required',
            'role_permissions.required' => 'At least one permission is required',
        ];
    }

    public function persist()
    {

        $role = new Role;

        $role->name = $this->role_name;
        $role->slug = str_replace(' ', '', strtolower($this->role_name));

        $role->save();

        foreach ($this->role_permissions as $role_permission) {

            $rolePermissions = new RolesPermission();
            $rolePermissions->role_id = $role->id;
            $rolePermissions->permission_id = $role_permission;
            $rolePermissions->save();

        }

    }
}
