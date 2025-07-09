<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationSession;

use Innoboxrr\ConsultantManager\Models\ConsultationSession;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationSessionResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationSession\Events\UpdateEvent;
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
        
        $consultationSession = ConsultationSession::findOrFail($this->consultation_session_id);

        return $this->user()->can('update', $consultationSession);

    }

    public function rules()
    {
        return [
            //
            'consultation_session_id' => 'required|numeric'
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

        $consultationSession = ConsultationSession::findOrFail($this->consultation_session_id);

        $consultationSession = $consultationSession->updateModel($this);

        $response = new ConsultationSessionResource($consultationSession);

        event(new UpdateEvent($consultationSession, $this->all(), $response));

        return $response;

    }

}
