<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultantRecordTemplate;

use Innoboxrr\ConsultantManager\Models\ConsultantRecordTemplate;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultantRecordTemplateResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultantRecordTemplate\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $consultantRecordTemplate = ConsultantRecordTemplate::findOrFail($this->consultant_record_template_id);

        return $this->user()->can('delete', $consultantRecordTemplate);

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

        $consultantRecordTemplate = ConsultantRecordTemplate::findOrFail($this->consultant_record_template_id);

        $consultantRecordTemplate->deleteModel();

        $response = new ConsultantRecordTemplateResource($consultantRecordTemplate);

        event(new DeleteEvent($consultantRecordTemplate, $this->all(), $response));

        return $response;

    }
    
}
