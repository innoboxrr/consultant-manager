<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationEvaluation;

use Innoboxrr\ConsultantManager\Models\ConsultationEvaluation;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationEvaluationResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationEvaluation\Events\CreateEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        return $this->user()->can('create', ConsultationEvaluation::class);

    }

    public function rules()
    {
        return [
            //
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

        $consultationEvaluation = (new ConsultationEvaluation)->createModel($this);

        $response = new ConsultationEvaluationResource($consultationEvaluation);

        event(new CreateEvent($consultationEvaluation, $this->all(), $response));

        return $response;

    }
    
}
