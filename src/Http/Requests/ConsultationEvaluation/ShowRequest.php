<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationEvaluation;

use Innoboxrr\ConsultantManager\Models\ConsultationEvaluation;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationEvaluationResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShowRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $consultationEvaluation = ConsultationEvaluation::findOrFail($this->consultation_evaluation_id);

        return $this->user()->can('view', $consultationEvaluation);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(ConsultationEvaluation::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(ConsultationEvaluation::$loadable_counts)
            ],
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

        $consultationEvaluation = ConsultationEvaluation::where('id', $this->consultation_evaluation_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new ConsultationEvaluationResource($consultationEvaluation);

    }
    
}
