<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationPostAttachment;

use Innoboxrr\ConsultantManager\Models\ConsultationPostAttachment;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationPostAttachmentResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationPostAttachment\Events\ForceDeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $consultationPostAttachment = ConsultationPostAttachment::withTrashed()->findOrFail($this->consultation_post_attachment_id);
        
        return $this->user()->can('forceDelete', $consultationPostAttachment);

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

        $consultationPostAttachment->forceDeleteModel();

        $response = new ConsultationPostAttachmentResource($consultationPostAttachment);

        event(new ForceDeleteEvent($consultationPostAttachment, $this->all(), $response));

        return $response;

    }
    
}
