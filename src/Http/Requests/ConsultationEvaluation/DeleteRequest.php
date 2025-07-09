<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationEvaluation;

use Innoboxrr\ConsultantManager\Models\ConsultationEvaluation;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationEvaluationResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationEvaluation\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $consultationEvaluation = ConsultationEvaluation::findOrFail($this->consultation_evaluation_id);

        return $this->user()->can('delete', $consultationEvaluation);

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

        $consultationEvaluation = ConsultationEvaluation::findOrFail($this->consultation_evaluation_id);

        $consultationEvaluation->deleteModel();

        $response = new ConsultationEvaluationResource($consultationEvaluation);

        event(new DeleteEvent($consultationEvaluation, $this->all(), $response));

        return $response;

    }
    
}
