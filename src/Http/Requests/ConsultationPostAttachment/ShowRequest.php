<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationPostAttachment;

use Innoboxrr\ConsultantManager\Models\ConsultationPostAttachment;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationPostAttachmentResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShowRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $consultationPostAttachment = ConsultationPostAttachment::findOrFail($this->consultation_post_attachment_id);

        return $this->user()->can('view', $consultationPostAttachment);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(ConsultationPostAttachment::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(ConsultationPostAttachment::$loadable_counts)
            ],
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

        $consultationPostAttachment = ConsultationPostAttachment::where('id', $this->consultation_post_attachment_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new ConsultationPostAttachmentResource($consultationPostAttachment);

    }
    
}
