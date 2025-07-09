<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultantRecordTemplate;

use Innoboxrr\ConsultantManager\Models\ConsultantRecordTemplate;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultantRecordTemplateResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultantRecordTemplate\Events\CreateEvent;
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

        return $this->user()->can('create', ConsultantRecordTemplate::class);

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

        $consultantRecordTemplate = (new ConsultantRecordTemplate)->createModel($this);

        $response = new ConsultantRecordTemplateResource($consultantRecordTemplate);

        event(new CreateEvent($consultantRecordTemplate, $this->all(), $response));

        return $response;

    }
    
}
