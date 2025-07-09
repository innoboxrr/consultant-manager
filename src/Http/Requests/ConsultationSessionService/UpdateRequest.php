<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationSessionService;

use Innoboxrr\ConsultantManager\Models\ConsultationSessionService;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationSessionServiceResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationSessionService\Events\UpdateEvent;
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
        
        $consultationSessionService = ConsultationSessionService::findOrFail($this->consultation_session_service_id);

        return $this->user()->can('update', $consultationSessionService);

    }

    public function rules()
    {
        return [
            //
            'consultation_session_service_id' => 'required|numeric'
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

        $consultationSessionService = ConsultationSessionService::findOrFail($this->consultation_session_service_id);

        $consultationSessionService = $consultationSessionService->updateModel($this);

        $response = new ConsultationSessionServiceResource($consultationSessionService);

        event(new UpdateEvent($consultationSessionService, $this->all(), $response));

        return $response;

    }

}
