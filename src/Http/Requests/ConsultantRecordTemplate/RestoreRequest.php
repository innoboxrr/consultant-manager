<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultantRecordTemplate;

use Innoboxrr\ConsultantManager\Models\ConsultantRecordTemplate;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultantRecordTemplateResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultantRecordTemplate\Events\RestoreEvent;
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
        
        $consultantRecordTemplate = ConsultantRecordTemplate::withTrashed()->findOrFail($this->consultant_record_template_id);
        
        return $this->user()->can('restore', $consultantRecordTemplate);

    }

    public function rules()
    {
        return [
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

        $consultantRecordTemplate = ConsultantRecordTemplate::withTrashed()->findOrFail($this->consultant_record_template_id);

        $consultantRecordTemplate->restoreModel();

        $response = new ConsultantRecordTemplateResource($consultantRecordTemplate);

        event(new RestoreEvent($consultantRecordTemplate, $this->all(), $response));

        return $response;

    }
    
}
