<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Service;
use App\Ticket;


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

    public function persist(ServiceRequest $request){

        $ticket = Ticket::create(['user_id' => auth()->id(), 'type' => 'Service']);

        $service = new Service;

        $service->ticket_id = $ticket->id;
        $service->category = $request->category;
        $service->subcategory = $request->subcategory;
        $service->block = $request->block;
        $service->department = $request->department;
        $service->floor = $request->floor;
        $service->room = $request->room;
        $service->assetcode = $request->assetcode;
        $service->quantity = $request->quantity;
        $service->description = $request->description;

        $service->save();

    }
}
