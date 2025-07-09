<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsulteeRecordCategory;

use Innoboxrr\ConsultantManager\Models\ConsulteeRecordCategory;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsulteeRecordCategoryResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsulteeRecordCategory\Events\RestoreEvent;
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
        
        $consulteeRecordCategory = ConsulteeRecordCategory::withTrashed()->findOrFail($this->consultee_record_category_id);
        
        return $this->user()->can('restore', $consulteeRecordCategory);

    }

    public function rules()
    {
        return [
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

        $consulteeRecordCategory = ConsulteeRecordCategory::withTrashed()->findOrFail($this->consultee_record_category_id);

        $consulteeRecordCategory->restoreModel();

        $response = new ConsulteeRecordCategoryResource($consulteeRecordCategory);

        event(new RestoreEvent($consulteeRecordCategory, $this->all(), $response));

        return $response;

    }
    
}
