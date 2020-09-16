<?php

namespace App\Http\Requests;

use App\Permissions\HasPermissionsTrait;
use App\User;
use Illuminate\Foundation\Http\FormRequest;
use App\Worker;

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

        $user->roles()->attach($this->user_role); // Attach Roles

        $user->permissions()->attach($this->user_permissions); // Attach User Permissions

        if ($this->user_role == 3) { // RoleID for Worker

            $worker = new Worker();

            $worker->user_id = $user->id;
            $worker->salary = 0;
            $worker->type_id = 1;

            $worker->save();
        }


    }
}
