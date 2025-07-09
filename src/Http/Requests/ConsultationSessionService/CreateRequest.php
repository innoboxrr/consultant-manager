<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationSessionService;

use Innoboxrr\ConsultantManager\Models\ConsultationSessionService;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationSessionServiceResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationSessionService\Events\CreateEvent;
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

        return $this->user()->can('create', ConsultationSessionService::class);

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

        $consultationSessionService = (new ConsultationSessionService)->createModel($this);

        $response = new ConsultationSessionServiceResource($consultationSessionService);

        event(new CreateEvent($consultationSessionService, $this->all(), $response));

        return $response;

    }
    
}
