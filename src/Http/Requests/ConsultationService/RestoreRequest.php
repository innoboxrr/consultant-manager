<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationService;

use Innoboxrr\ConsultantManager\Models\ConsultationService;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationServiceResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationService\Events\RestoreEvent;
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
        
        $consultationService = ConsultationService::withTrashed()->findOrFail($this->consultation_service_id);
        
        return $this->user()->can('restore', $consultationService);

    }

    public function rules()
    {
        return [
            'consultation_service_id' => 'required|numeric'
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

        $consultationService = ConsultationService::withTrashed()->findOrFail($this->consultation_service_id);

        $consultationService->restoreModel();

        $response = new ConsultationServiceResource($consultationService);

        event(new RestoreEvent($consultationService, $this->all(), $response));

        return $response;

    }
    
}
