<?php

namespace App\Http\Requests;

use App\Ticket;
use Illuminate\Foundation\Http\FormRequest;
use App\ServiceAction;
use App\ServiceActionsAuthority;
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
            'fund' => 'required_without:worker_id',
            'worker_id' => 'required_without:fund',
            'authorities' => 'required_with:fund',
            'adminremarks' => 'required'
        ];

    }

    public function messages()
    {

        return [
            'fund.required_without' => 'The fund field is required if the worker field in not specified',
            'worker_id.required_without' => 'The worker field is required if the fund field in not specified',
            'authorities.required_with' => 'Approvals are needed for funding',
            'adminremarks.required' => 'The remarks field is required'
        ];

    }

    public function persist()
    {

        $serviceAction = ServiceAction::where('service_id', $this->serviceId)->first();

        if ($serviceAction) {

            $serviceAction->update(['worker_id' => request('worker_id'),
                'eta' => request('eta'),
                'adminremarks' => request('adminremarks')]);

        } else {

            $serviceAction = new ServiceAction;

            $serviceAction->service_id = $this->serviceId;
            $serviceAction->worker_id = $this->worker_id;

            $serviceAction->adminremarks = $this->adminremarks;
            $serviceAction->fund = $this->fund;

            $serviceAction->save(); // Save ServiceAction

            $serviceAction->authorities()->attach($this->authorities); // Attach ServiceActionsAuthority

            $serviceActionAuthoritiesIds = ServiceActionsAuthority::where('service_action_id', $serviceAction->id)->get()->pluck('authority_id');
            $serviceActionAuthorities = Authority::whereIn('id', $serviceActionAuthoritiesIds)->get()->pluck('name');


            $ticket = Ticket::where('service_id', $serviceAction->service_id)->first();
            $ticket->update($this->authorities ? ['status_id' => 3] : ['status_id' => 2]); // Update Status

            event(new ServiceActionEvent($serviceAction->toArray(), $serviceActionAuthorities->toArray())); // Fire Event

        }


    }
}
