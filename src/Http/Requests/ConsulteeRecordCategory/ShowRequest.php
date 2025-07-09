<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsulteeRecordCategory;

use Innoboxrr\ConsultantManager\Models\ConsulteeRecordCategory;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsulteeRecordCategoryResource;
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

        $consulteeRecordCategory = ConsulteeRecordCategory::findOrFail($this->consultee_record_category_id);

        return $this->user()->can('view', $consulteeRecordCategory);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(ConsulteeRecordCategory::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(ConsulteeRecordCategory::$loadable_counts)
            ],
            'consultee_record_category_id' => 'required|numeric'
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

        $consulteeRecordCategory = ConsulteeRecordCategory::where('id', $this->consultee_record_category_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new ConsulteeRecordCategoryResource($consulteeRecordCategory);

    }
    
}
