<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationChatMessage;

use Innoboxrr\ConsultantManager\Models\ConsultationChatMessage;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationChatMessageResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationChatMessage\Events\CreateEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        return $this->user()->can('create', ConsultationChatMessage::class);

    }

    public function rules()
    {
        return [
            //
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

        $consultationChatMessage = (new ConsultationChatMessage)->createModel($this);

        $response = new ConsultationChatMessageResource($consultationChatMessage);

        event(new CreateEvent($consultationChatMessage, $this->all(), $response));

        return $response;

    }
    
}
