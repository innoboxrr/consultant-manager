<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsulteeRecordResponse;

use Innoboxrr\ConsultantManager\Models\ConsulteeRecordResponse;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsulteeRecordResponseResource;
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

        $consulteeRecordResponse = ConsulteeRecordResponse::findOrFail($this->consultee_record_response_id);

        return $this->user()->can('view', $consulteeRecordResponse);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(ConsulteeRecordResponse::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(ConsulteeRecordResponse::$loadable_counts)
            ],
            'consultee_record_response_id' => 'required|numeric'
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

        $consulteeRecordResponse = ConsulteeRecordResponse::where('id', $this->consultee_record_response_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new ConsulteeRecordResponseResource($consulteeRecordResponse);

    }
    
}
