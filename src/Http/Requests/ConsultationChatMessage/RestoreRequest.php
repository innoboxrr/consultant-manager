<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationChatMessage;

use Innoboxrr\ConsultantManager\Models\ConsultationChatMessage;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationChatMessageResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationChatMessage\Events\RestoreEvent;
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
        
        $consultationChatMessage = ConsultationChatMessage::withTrashed()->findOrFail($this->consultation_chat_message_id);
        
        return $this->user()->can('restore', $consultationChatMessage);

    }

    public function rules()
    {
        return [
            'consultation_chat_message_id' => 'required|numeric'
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

        $consultationChatMessage = ConsultationChatMessage::withTrashed()->findOrFail($this->consultation_chat_message_id);

        $consultationChatMessage->restoreModel();

        $response = new ConsultationChatMessageResource($consultationChatMessage);

        event(new RestoreEvent($consultationChatMessage, $this->all(), $response));

        return $response;

    }
    
}
