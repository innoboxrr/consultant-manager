<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationChat;

use Innoboxrr\ConsultantManager\Models\ConsultationChat;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationChatResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationChat\Events\ForceDeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $consultationChat = ConsultationChat::withTrashed()->findOrFail($this->consultation_chat_id);
        
        return $this->user()->can('forceDelete', $consultationChat);

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

        $consultationChat->forceDeleteModel();

        $response = new ConsultationChatResource($consultationChat);

        event(new ForceDeleteEvent($consultationChat, $this->all(), $response));

        return $response;

    }
    
}
