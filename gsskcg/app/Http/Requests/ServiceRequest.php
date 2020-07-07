<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Service;
use App\Ticket;
use App\TicketInfo;


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

        $ticketTypeId = TicketInfo::where('type', 'Service')->first()->id;

        $ticket = Ticket::create(['user_id' => auth()->id(), 'type_id' => $ticketTypeId]);

        $service = new Service;

        $service->ticket_id = $ticket->id;
        $service->category = $this->category;
        $service->subcategory = $this->subcategory;
        $service->block = $this->block;
        $service->department = $this->department;
        $service->floor = $this->floor;
        $service->room = $this->room;
        $service->assetcode = $this->assetcode;
        $service->quantity = $this->quantity;
        $service->description = $this->description;

        $service->save();

    }
}
