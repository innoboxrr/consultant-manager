<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationAdvice;

use Innoboxrr\ConsultantManager\Models\ConsultationAdvice;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationAdviceResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationAdvice\Events\UpdateEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $consultationAdvice = ConsultationAdvice::findOrFail($this->consultation_advice_id);

        return $this->user()->can('update', $consultationAdvice);

    }

    public function rules()
    {
        return [
            //
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

        $consultationAdvice = $consultationAdvice->updateModel($this);

        $response = new ConsultationAdviceResource($consultationAdvice);

        event(new UpdateEvent($consultationAdvice, $this->all(), $response));

        return $response;

    }

}
