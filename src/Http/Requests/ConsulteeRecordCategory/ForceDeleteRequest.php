<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsulteeRecordCategory;

use Innoboxrr\ConsultantManager\Models\ConsulteeRecordCategory;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsulteeRecordCategoryResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsulteeRecordCategory\Events\ForceDeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $consulteeRecordCategory = ConsulteeRecordCategory::withTrashed()->findOrFail($this->consultee_record_category_id);
        
        return $this->user()->can('forceDelete', $consulteeRecordCategory);

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

        $consulteeRecordCategory->forceDeleteModel();

        $response = new ConsulteeRecordCategoryResource($consulteeRecordCategory);

        event(new ForceDeleteEvent($consulteeRecordCategory, $this->all(), $response));

        return $response;

    }
    
}
