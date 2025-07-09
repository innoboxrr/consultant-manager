<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationPostAttachment;

use Innoboxrr\ConsultantManager\Models\ConsultationPostAttachment;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationPostAttachmentResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationPostAttachment\Events\RestoreEvent;
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
        
        $consultationPostAttachment = ConsultationPostAttachment::withTrashed()->findOrFail($this->consultation_post_attachment_id);
        
        return $this->user()->can('restore', $consultationPostAttachment);

    }

    public function rules()
    {
        return [
            'consultation_post_attachment_id' => 'required|numeric'
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

        $consultationPostAttachment = ConsultationPostAttachment::withTrashed()->findOrFail($this->consultation_post_attachment_id);

        $consultationPostAttachment->restoreModel();

        $response = new ConsultationPostAttachmentResource($consultationPostAttachment);

        event(new RestoreEvent($consultationPostAttachment, $this->all(), $response));

        return $response;

    }
    
}
