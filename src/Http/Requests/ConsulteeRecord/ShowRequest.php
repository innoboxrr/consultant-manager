<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsulteeRecord;

use Innoboxrr\ConsultantManager\Models\ConsulteeRecord;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsulteeRecordResource;
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

        $consulteeRecord = ConsulteeRecord::findOrFail($this->consultee_record_id);

        return $this->user()->can('view', $consulteeRecord);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(ConsulteeRecord::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(ConsulteeRecord::$loadable_counts)
            ],
            'consultee_record_id' => 'required|numeric'
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

        $consulteeRecord = ConsulteeRecord::where('id', $this->consultee_record_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new ConsulteeRecordResource($consulteeRecord);

    }
    
}
