<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationService;

use Innoboxrr\ConsultantManager\Models\ConsultationService;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationServiceResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationService\Events\UpdateEvent;
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
        
        $consultationService = ConsultationService::findOrFail($this->consultation_service_id);

        return $this->user()->can('update', $consultationService);

    }

    public function rules()
    {
        return [
            //
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

        $consultationService = ConsultationService::findOrFail($this->consultation_service_id);

        $consultationService = $consultationService->updateModel($this);

        $response = new ConsultationServiceResource($consultationService);

        event(new UpdateEvent($consultationService, $this->all(), $response));

        return $response;

    }

}
