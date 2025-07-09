<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationChat;

use Innoboxrr\ConsultantManager\Models\ConsultationChat;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationChatResource;
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

        $consultationChat = ConsultationChat::findOrFail($this->consultation_chat_id);

        return $this->user()->can('view', $consultationChat);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(ConsultationChat::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(ConsultationChat::$loadable_counts)
            ],
            'consultation_chat_id' => 'required|numeric'
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

        $consultationChat = ConsultationChat::where('id', $this->consultation_chat_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new ConsultationChatResource($consultationChat);

    }
    
}
