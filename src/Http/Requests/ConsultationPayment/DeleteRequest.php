<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationPayment;

use Innoboxrr\ConsultantManager\Models\ConsultationPayment;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationPaymentResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationPayment\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $consultationPayment = ConsultationPayment::findOrFail($this->consultation_payment_id);

        return $this->user()->can('delete', $consultationPayment);

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

        $consultationPayment = ConsultationPayment::findOrFail($this->consultation_payment_id);

        $consultationPayment->deleteModel();

        $response = new ConsultationPaymentResource($consultationPayment);

        event(new DeleteEvent($consultationPayment, $this->all(), $response));

        return $response;

    }
    
}
