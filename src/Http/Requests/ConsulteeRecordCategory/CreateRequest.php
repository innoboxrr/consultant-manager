<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsulteeRecordCategory;

use Innoboxrr\ConsultantManager\Models\ConsulteeRecordCategory;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsulteeRecordCategoryResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsulteeRecordCategory\Events\CreateEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        return $this->user()->can('create', ConsulteeRecordCategory::class);

    }

    public function rules()
    {
        return [
            //
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

        $consulteeRecordCategory = (new ConsulteeRecordCategory)->createModel($this);

        $response = new ConsulteeRecordCategoryResource($consulteeRecordCategory);

        event(new CreateEvent($consulteeRecordCategory, $this->all(), $response));

        return $response;

    }
    
}
