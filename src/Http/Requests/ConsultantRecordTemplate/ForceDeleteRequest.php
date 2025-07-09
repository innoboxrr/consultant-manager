<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultantRecordTemplate;

use Innoboxrr\ConsultantManager\Models\ConsultantRecordTemplate;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultantRecordTemplateResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultantRecordTemplate\Events\ForceDeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $consultantRecordTemplate = ConsultantRecordTemplate::withTrashed()->findOrFail($this->consultant_record_template_id);
        
        return $this->user()->can('forceDelete', $consultantRecordTemplate);

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

        $consultantRecordTemplate->forceDeleteModel();

        $response = new ConsultantRecordTemplateResource($consultantRecordTemplate);

        event(new ForceDeleteEvent($consultantRecordTemplate, $this->all(), $response));

        return $response;

    }
    
}
