<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationService;

use Innoboxrr\ConsultantManager\Models\ConsultationService;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationServiceResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationService\Events\CreateEvent;
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

        return $this->user()->can('create', ConsultationService::class);

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

        $consultationService = (new ConsultationService)->createModel($this);

        $response = new ConsultationServiceResource($consultationService);

        event(new CreateEvent($consultationService, $this->all(), $response));

        return $response;

    }
    
}
