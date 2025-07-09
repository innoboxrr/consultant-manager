<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultantRecordTemplate;

use Innoboxrr\ConsultantManager\Models\ConsultantRecordTemplate;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultantRecordTemplateResource;
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

        $consultantRecordTemplate = ConsultantRecordTemplate::findOrFail($this->consultant_record_template_id);

        return $this->user()->can('view', $consultantRecordTemplate);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(ConsultantRecordTemplate::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(ConsultantRecordTemplate::$loadable_counts)
            ],
            'consultant_record_template_id' => 'required|numeric'
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

        $consultantRecordTemplate = ConsultantRecordTemplate::where('id', $this->consultant_record_template_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new ConsultantRecordTemplateResource($consultantRecordTemplate);

    }
    
}
