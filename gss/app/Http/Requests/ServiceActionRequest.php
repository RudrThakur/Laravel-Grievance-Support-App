<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\ServiceAction;

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
            $serviceAction->approvals = implode(',', $this->authorities);
            $serviceAction->adminremarks = $this->adminremarks;
            $serviceAction->fund = $this->fund;
    
            $serviceAction->save();
        }
       
        else{
         
            $currentServiceAction->service_id = $this->serviceId;
            $currentServiceAction->worker_id = $this->worker_id;
            $currentServiceAction->approvals = implode(',', $this->authorities);
            $currentServiceAction->adminremarks = $this->adminremarks;
            $currentServiceAction->fund = $this->fund;
    
            $currentServiceAction->save();
        }

    }
}
