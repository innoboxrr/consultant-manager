<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationSession;

use Innoboxrr\ConsultantManager\Models\ConsultationSession;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationSessionResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationSession\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $consultationSession = ConsultationSession::findOrFail($this->consultation_session_id);

        return $this->user()->can('delete', $consultationSession);

    }

    public function rules()
    {
        return [
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

        $consultationSession->deleteModel();

        $response = new ConsultationSessionResource($consultationSession);

        event(new DeleteEvent($consultationSession, $this->all(), $response));

        return $response;

    }
    
}
