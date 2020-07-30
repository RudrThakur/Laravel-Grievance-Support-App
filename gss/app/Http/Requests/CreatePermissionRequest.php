<?php

namespace App\Http\Requests;

use App\Permission;
use Illuminate\Foundation\Http\FormRequest;

class CreatePermissionRequest extends FormRequest
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
            'permission_name' => 'required',
        ];

    }

    public function messages()
    {
        return [
            'permission_name.required' => 'The permission field is required',
        ];
    }

    public function persist()
    {

        $permission = new Permission();

        $permission->name = $this->permission_name;
        $permission->slug = str_replace(' ', '-', strtolower($this->permission_name));

        $permission->save();

    }
}
