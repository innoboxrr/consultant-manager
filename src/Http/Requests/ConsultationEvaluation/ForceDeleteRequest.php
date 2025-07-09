<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationEvaluation;

use Innoboxrr\ConsultantManager\Models\ConsultationEvaluation;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationEvaluationResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationEvaluation\Events\ForceDeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $consultationEvaluation = ConsultationEvaluation::withTrashed()->findOrFail($this->consultation_evaluation_id);
        
        return $this->user()->can('forceDelete', $consultationEvaluation);

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

        $consultationEvaluation->forceDeleteModel();

        $response = new ConsultationEvaluationResource($consultationEvaluation);

        event(new ForceDeleteEvent($consultationEvaluation, $this->all(), $response));

        return $response;

    }
    
}
