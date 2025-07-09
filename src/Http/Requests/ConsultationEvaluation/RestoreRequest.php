<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationEvaluation;

use Innoboxrr\ConsultantManager\Models\ConsultationEvaluation;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationEvaluationResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationEvaluation\Events\RestoreEvent;
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
        
        $consultationEvaluation = ConsultationEvaluation::withTrashed()->findOrFail($this->consultation_evaluation_id);
        
        return $this->user()->can('restore', $consultationEvaluation);

    }

    public function rules()
    {
        return [
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

        $consultationEvaluation = ConsultationEvaluation::withTrashed()->findOrFail($this->consultation_evaluation_id);

        $consultationEvaluation->restoreModel();

        $response = new ConsultationEvaluationResource($consultationEvaluation);

        event(new RestoreEvent($consultationEvaluation, $this->all(), $response));

        return $response;

    }
    
}
