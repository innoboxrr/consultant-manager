<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsulteeRecordCategory;

use Innoboxrr\ConsultantManager\Models\ConsulteeRecordCategory;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsulteeRecordCategoryResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsulteeRecordCategory\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $consulteeRecordCategory = ConsulteeRecordCategory::findOrFail($this->consultee_record_category_id);

        return $this->user()->can('delete', $consulteeRecordCategory);

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

        $consulteeRecordCategory = ConsulteeRecordCategory::findOrFail($this->consultee_record_category_id);

        $consulteeRecordCategory->deleteModel();

        $response = new ConsulteeRecordCategoryResource($consulteeRecordCategory);

        event(new DeleteEvent($consulteeRecordCategory, $this->all(), $response));

        return $response;

    }
    
}
