<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationAdvice;

use Innoboxrr\ConsultantManager\Models\ConsultationAdvice;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationAdviceResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationAdvice\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $consultationAdvice = ConsultationAdvice::findOrFail($this->consultation_advice_id);

        return $this->user()->can('delete', $consultationAdvice);

    }

    public function rules()
    {
        return [
            'consultation_advice_id' => 'required|numeric'
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

        $consultationAdvice = ConsultationAdvice::findOrFail($this->consultation_advice_id);

        $consultationAdvice->deleteModel();

        $response = new ConsultationAdviceResource($consultationAdvice);

        event(new DeleteEvent($consultationAdvice, $this->all(), $response));

        return $response;

    }
    
}
