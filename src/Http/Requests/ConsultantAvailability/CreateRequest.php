<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultantAvailability;

use Innoboxrr\ConsultantManager\Models\ConsultantAvailability;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultantAvailabilityResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultantAvailability\Events\CreateEvent;
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

        return $this->user()->can('create', ConsultantAvailability::class);

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

        $consultantAvailability = (new ConsultantAvailability)->createModel($this);

        $response = new ConsultantAvailabilityResource($consultantAvailability);

        event(new CreateEvent($consultantAvailability, $this->all(), $response));

        return $response;

    }
    
}
