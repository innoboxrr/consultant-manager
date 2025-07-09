<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationPayment;

use Innoboxrr\ConsultantManager\Models\ConsultationPayment;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationPaymentResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationPayment\Events\RestoreEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RestoreRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $consultationPayment = ConsultationPayment::withTrashed()->findOrFail($this->consultation_payment_id);
        
        return $this->user()->can('restore', $consultationPayment);

    }

    public function rules()
    {
        return [
            'consultation_payment_id' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }

    public function attributes()
    {
        return [
            //
        ];
    }

    protected function passedValidation()
    {
        //
    }

    public function handle()
    {

        $consultationPayment = ConsultationPayment::withTrashed()->findOrFail($this->consultation_payment_id);

        $consultationPayment->restoreModel();

        $response = new ConsultationPaymentResource($consultationPayment);

        event(new RestoreEvent($consultationPayment, $this->all(), $response));

        return $response;

    }
    
}
