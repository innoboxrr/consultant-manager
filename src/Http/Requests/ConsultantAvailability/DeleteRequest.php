<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultantAvailability;

use Innoboxrr\ConsultantManager\Models\ConsultantAvailability;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultantAvailabilityResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultantAvailability\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $consultantAvailability = ConsultantAvailability::findOrFail($this->consultant_availability_id);

        return $this->user()->can('delete', $consultantAvailability);

    }

    public function rules()
    {
        return [
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

        $consultantAvailability->deleteModel();

        $response = new ConsultantAvailabilityResource($consultantAvailability);

        event(new DeleteEvent($consultantAvailability, $this->all(), $response));

        return $response;

    }
    
}
