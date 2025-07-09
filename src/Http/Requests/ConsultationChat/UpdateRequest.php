<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationChat;

use Innoboxrr\ConsultantManager\Models\ConsultationChat;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationChatResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationChat\Events\UpdateEvent;
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
        
        $consultationChat = ConsultationChat::findOrFail($this->consultation_chat_id);

        return $this->user()->can('update', $consultationChat);

    }

    public function rules()
    {
        return [
            //
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

        $consultationChat = ConsultationChat::findOrFail($this->consultation_chat_id);

        $consultationChat = $consultationChat->updateModel($this);

        $response = new ConsultationChatResource($consultationChat);

        event(new UpdateEvent($consultationChat, $this->all(), $response));

        return $response;

    }

}
