<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultantAvailability;

use Innoboxrr\ConsultantManager\Models\ConsultantAvailability;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultantAvailabilityResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultantAvailability\Events\UpdateEvent;
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
        
        $consultantAvailability = ConsultantAvailability::findOrFail($this->consultant_availability_id);

        return $this->user()->can('update', $consultantAvailability);

    }

    public function rules()
    {
        return [
            //
            'consultant_availability_id' => 'required|numeric'
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

        $consultantAvailability = ConsultantAvailability::findOrFail($this->consultant_availability_id);

        $consultantAvailability = $consultantAvailability->updateModel($this);

        $response = new ConsultantAvailabilityResource($consultantAvailability);

        event(new UpdateEvent($consultantAvailability, $this->all(), $response));

        return $response;

    }

}
