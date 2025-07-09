<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationChatMessage;

use Innoboxrr\ConsultantManager\Models\ConsultationChatMessage;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationChatMessageResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationChatMessage\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $consultationChatMessage = ConsultationChatMessage::findOrFail($this->consultation_chat_message_id);

        return $this->user()->can('delete', $consultationChatMessage);

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

        $consultationChatMessage = ConsultationChatMessage::findOrFail($this->consultation_chat_message_id);

        $consultationChatMessage->deleteModel();

        $response = new ConsultationChatMessageResource($consultationChatMessage);

        event(new DeleteEvent($consultationChatMessage, $this->all(), $response));

        return $response;

    }
    
}
