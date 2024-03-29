<?php

namespace App\Http\Requests;

use App\Notifications\TicketRegistration;
use Illuminate\Foundation\Http\FormRequest;

use App\Service;
use App\Ticket;
use App\TicketInfo;

use App\Events\NewTicketAdded;
use App\Http\Controllers\User\TicketController;

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

            'priority_id' => 'required',
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

    public function messages(){
        return [
            'priority_id.required' => 'The priority field is required',
        ];
    }

    public function persist(){

        $ticket = Ticket::create(

            array(
                'user_id' => auth()->user()->id,
                'type_id' => 1,
                'authority_id' => 1,
                'status_id' => 1
            )
        );

        $service = new Service;

        $service->ticket_id = $ticket->id;
        $service->priority_id = $this->priority_id;
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

        $ticket->update(['service_id' => $service->id]);

        event(new NewTicketAdded($ticket));

    }
}
