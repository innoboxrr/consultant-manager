<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationAdvice;

use Innoboxrr\ConsultantManager\Models\ConsultationAdvice;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationAdviceResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationAdvice\Events\ForceDeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $consultationAdvice = ConsultationAdvice::withTrashed()->findOrFail($this->consultation_advice_id);
        
        return $this->user()->can('forceDelete', $consultationAdvice);

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

        $consultationAdvice->forceDeleteModel();

        $response = new ConsultationAdviceResource($consultationAdvice);

        event(new ForceDeleteEvent($consultationAdvice, $this->all(), $response));

        return $response;

    }
    
}
