<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsulteeRecordCategory;

use Innoboxrr\ConsultantManager\Models\ConsulteeRecordCategory;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsulteeRecordCategoryResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsulteeRecordCategory\Events\UpdateEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $consulteeRecordCategory = ConsulteeRecordCategory::findOrFail($this->consultee_record_category_id);

        return $this->user()->can('update', $consulteeRecordCategory);

    }

    public function rules()
    {
        return [
            //
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

        $consulteeRecordCategory = $consulteeRecordCategory->updateModel($this);

        $response = new ConsulteeRecordCategoryResource($consulteeRecordCategory);

        event(new UpdateEvent($consulteeRecordCategory, $this->all(), $response));

        return $response;

    }

}
