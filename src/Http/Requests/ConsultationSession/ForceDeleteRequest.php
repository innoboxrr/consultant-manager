<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationSession;

use Innoboxrr\ConsultantManager\Models\ConsultationSession;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationSessionResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationSession\Events\ForceDeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $consultationSession = ConsultationSession::withTrashed()->findOrFail($this->consultation_session_id);
        
        return $this->user()->can('forceDelete', $consultationSession);

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

        $consultationSession = ConsultationSession::withTrashed()->findOrFail($this->consultation_session_id);

        $consultationSession->forceDeleteModel();

        $response = new ConsultationSessionResource($consultationSession);

        event(new ForceDeleteEvent($consultationSession, $this->all(), $response));

        return $response;

    }
    
}
