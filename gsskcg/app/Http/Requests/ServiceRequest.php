<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Service;


class ServiceRequest extends FormRequest
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

            'category' => 'required',
            'subcategory' => 'required',
            'block' => 'required',
            'department' => 'required',
            'floor' => 'required',
            'room' => 'required',
            'quantity' => 'required',
            'description' => 'required'

        ];
    }

    public function persist(){

        
        $service = Service::create(

            $this->only(['category',
            'subcategory',
            'block',
            'department',
            'floor',
            'room',
            'assetcode',
            'quantity',
            'description'])
            
        );


    }
}
