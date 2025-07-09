<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultantAvailability;

use Innoboxrr\ConsultantManager\Models\ConsultantAvailability;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultantAvailabilityResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultantAvailability\Events\ForceDeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $consultantAvailability = ConsultantAvailability::withTrashed()->findOrFail($this->consultant_availability_id);
        
        return $this->user()->can('forceDelete', $consultantAvailability);

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

        $consultantAvailability = ConsultantAvailability::withTrashed()->findOrFail($this->consultant_availability_id);

        $consultantAvailability->forceDeleteModel();

        $response = new ConsultantAvailabilityResource($consultantAvailability);

        event(new ForceDeleteEvent($consultantAvailability, $this->all(), $response));

        return $response;

    }
    
}
