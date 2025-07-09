<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationPostAttachment;

use Innoboxrr\ConsultantManager\Models\ConsultationPostAttachment;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationPostAttachmentResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationPostAttachment\Events\UpdateEvent;
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
        
        $consultationPostAttachment = ConsultationPostAttachment::findOrFail($this->consultation_post_attachment_id);

        return $this->user()->can('update', $consultationPostAttachment);

    }

    public function rules()
    {
        return [
            //
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

        $consultationPostAttachment = $consultationPostAttachment->updateModel($this);

        $response = new ConsultationPostAttachmentResource($consultationPostAttachment);

        event(new UpdateEvent($consultationPostAttachment, $this->all(), $response));

        return $response;

    }

}
