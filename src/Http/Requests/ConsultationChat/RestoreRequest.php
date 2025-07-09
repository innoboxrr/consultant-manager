<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationChat;

use Innoboxrr\ConsultantManager\Models\ConsultationChat;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationChatResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationChat\Events\RestoreEvent;
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
        
        $consultationChat = ConsultationChat::withTrashed()->findOrFail($this->consultation_chat_id);
        
        return $this->user()->can('restore', $consultationChat);

    }

    public function rules()
    {
        return [
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

        $consultationChat = ConsultationChat::withTrashed()->findOrFail($this->consultation_chat_id);

        $consultationChat->restoreModel();

        $response = new ConsultationChatResource($consultationChat);

        event(new RestoreEvent($consultationChat, $this->all(), $response));

        return $response;

    }
    
}
