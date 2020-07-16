<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\ServiceAction;
use App\ServiceActionsAuthority;
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
        ];

    }

    public function messages(){

        return [
            'fund.required_without' => 'The fund field is required if the worker field in not specified',
            'worker_id.required_without' => 'The worker field is required if the fund field in not specified',
        ];

    }

    public function persist(){

        $currentServiceAction = ServiceAction::where('service_id', $this->serviceId)->first();

        if(empty($currentServiceAction)){
            $serviceAction = new ServiceAction;

            $serviceAction->service_id = $this->serviceId;
            $serviceAction->worker_id = $this->worker_id;

            $serviceAction->adminremarks = $this->adminremarks;
            $serviceAction->fund = $this->fund;
  
            $serviceAction->save();

            if($this->authorities){

                foreach($this->authorities as $authority){
                    $serviceAction->authorities()->attach($authority);
                }
            }

            event(new ServiceActionEvent($serviceAction->toArray()));
        }
       
        else{
         
            $currentServiceAction->service_id = $this->serviceId;
            $currentServiceAction->worker_id = $this->worker_id;

            $currentServiceAction->adminremarks = $this->adminremarks;
            $currentServiceAction->fund = $this->fund;
    
            $currentServiceAction->save();

            if($this->authorities){
                
                ServiceActionsAuthority::where('service_action_id', $currentServiceAction->id)->delete(); // Delete Existing Entries
                
                foreach($this->authorities as $authority){
                    $currentServiceAction->authorities()->attach($authority);
                }
                
            }
           
            event(new ServiceActionEvent($currentServiceAction->toArray()));
        }

    }
}
