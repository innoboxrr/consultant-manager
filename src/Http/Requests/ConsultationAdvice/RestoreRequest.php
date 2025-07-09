<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationAdvice;

use Innoboxrr\ConsultantManager\Models\ConsultationAdvice;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationAdviceResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationAdvice\Events\RestoreEvent;
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
        
        $consultationAdvice = ConsultationAdvice::withTrashed()->findOrFail($this->consultation_advice_id);
        
        return $this->user()->can('restore', $consultationAdvice);

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

        $consultationAdvice = ConsultationAdvice::withTrashed()->findOrFail($this->consultation_advice_id);

        $consultationAdvice->restoreModel();

        $response = new ConsultationAdviceResource($consultationAdvice);

        event(new RestoreEvent($consultationAdvice, $this->all(), $response));

        return $response;

    }
    
}
