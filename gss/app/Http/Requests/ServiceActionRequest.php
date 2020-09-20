<?php

namespace App\Http\Requests;

use App\Ticket;
use Illuminate\Foundation\Http\FormRequest;
use App\ServiceAction;
use App\ServiceActionsAuthority;
use App\Service;
use App\User;
use App\Notifications\TicketStatusChange;
use App\Authority;
use App\Events\ServiceActionEvent;

class ServiceActionRequest extends FormRequest
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
            'deny_funding_check' => 'required_without:fund',
            'fund' => 'required_without:deny_funding_check',
            'authorities' => 'required_with:fund',
            'adminremarks' => 'required_without:deny_funding_check'
        ];

    }

    public function messages()
    {

        return [
            'deny_funding_check.required_without' => 'Please confirm that no funding is required',
            'fund.required_without' => 'The fund field is required if not confirmed that no funding is needed',
            'authorities.required_with' => 'Approvals are needed for funding',
            'adminremarks.required_without' => 'The remarks field is required'
        ];

    }

    public function persist()
    {

        $serviceAction = new ServiceAction;

        $serviceAction->service_id = $this->serviceId;
        $serviceAction->adminremarks = $this->adminremarks;
        $serviceAction->fund = $this->fund;

        $serviceAction->save(); // Save ServiceAction

        $serviceAction->authorities()->attach($this->authorities); // Attach ServiceActionsAuthority

        $serviceActionAuthoritiesIds = ServiceActionsAuthority::where('service_action_id', $serviceAction->id)->get()->pluck('authority_id');
        $serviceActionAuthorities = Authority::whereIn('id', $serviceActionAuthoritiesIds)->get()->pluck('name');


        $ticket = Ticket::where('service_id', $serviceAction->service_id)->first();
        $ticket->update($this->authorities ? ['status_id' => 3] : ['status_id' => 2]); // Update Status


        event(new ServiceActionEvent($serviceAction->toArray(), $serviceActionAuthorities->toArray())); // Fire Event
        $user = User::where('id',$ticket->user_id)->first();
        $user->notify(new TicketStatusChange($ticket->id,$ticket->status->status));


    }
}
