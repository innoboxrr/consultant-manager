<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationService;

use Innoboxrr\ConsultantManager\Models\ConsultationService;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationServiceResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationService\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $consultationService = ConsultationService::findOrFail($this->consultation_service_id);

        return $this->user()->can('delete', $consultationService);

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

        $consultationService = ConsultationService::findOrFail($this->consultation_service_id);

        $consultationService->deleteModel();

        $response = new ConsultationServiceResource($consultationService);

        event(new DeleteEvent($consultationService, $this->all(), $response));

        return $response;

    }
    
}
