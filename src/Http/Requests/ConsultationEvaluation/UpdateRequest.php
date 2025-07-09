<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationEvaluation;

use Innoboxrr\ConsultantManager\Models\ConsultationEvaluation;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationEvaluationResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationEvaluation\Events\UpdateEvent;
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
        
        $consultationEvaluation = ConsultationEvaluation::findOrFail($this->consultation_evaluation_id);

        return $this->user()->can('update', $consultationEvaluation);

    }

    public function rules()
    {
        return [
            //
            'consultation_evaluation_id' => 'required|numeric'
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

        $consultationEvaluation = ConsultationEvaluation::findOrFail($this->consultation_evaluation_id);

        $consultationEvaluation = $consultationEvaluation->updateModel($this);

        $response = new ConsultationEvaluationResource($consultationEvaluation);

        event(new UpdateEvent($consultationEvaluation, $this->all(), $response));

        return $response;

    }

}
