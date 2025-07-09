<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationAdvice;

use Innoboxrr\ConsultantManager\Models\ConsultationAdvice;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationAdviceResource;
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

        $consultationAdvice = ConsultationAdvice::findOrFail($this->consultation_advice_id);

        return $this->user()->can('view', $consultationAdvice);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(ConsultationAdvice::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(ConsultationAdvice::$loadable_counts)
            ],
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

        $consultationAdvice = ConsultationAdvice::where('id', $this->consultation_advice_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new ConsultationAdviceResource($consultationAdvice);

    }
    
}
