<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationPostAttachment;

use Innoboxrr\ConsultantManager\Models\ConsultationPostAttachment;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationPostAttachmentResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationPostAttachment\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $consultationPostAttachment = ConsultationPostAttachment::findOrFail($this->consultation_post_attachment_id);

        return $this->user()->can('delete', $consultationPostAttachment);

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

        $consultationPostAttachment = ConsultationPostAttachment::findOrFail($this->consultation_post_attachment_id);

        $consultationPostAttachment->deleteModel();

        $response = new ConsultationPostAttachmentResource($consultationPostAttachment);

        event(new DeleteEvent($consultationPostAttachment, $this->all(), $response));

        return $response;

    }
    
}
