<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationAppointment;

use Innoboxrr\ConsultantManager\Models\ConsultationAppointment;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationAppointmentResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationAppointment\Events\UpdateEvent;
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
        
        $consultationAppointment = ConsultationAppointment::findOrFail($this->consultation_appointment_id);

        return $this->user()->can('update', $consultationAppointment);

    }

    public function rules()
    {
        return [
            //
            'consultation_appointment_id' => 'required|numeric'
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

        $consultationAppointment = ConsultationAppointment::findOrFail($this->consultation_appointment_id);

        $consultationAppointment = $consultationAppointment->updateModel($this);

        $response = new ConsultationAppointmentResource($consultationAppointment);

        event(new UpdateEvent($consultationAppointment, $this->all(), $response));

        return $response;

    }

}
