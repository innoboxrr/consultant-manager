<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationAppointmentAttendee;

use Innoboxrr\ConsultantManager\Models\ConsultationAppointmentAttendee;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationAppointmentAttendeeResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationAppointmentAttendee\Events\UpdateEvent;
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
        
        $consultationAppointmentAttendee = ConsultationAppointmentAttendee::findOrFail($this->consultation_appointment_attendee_id);

        return $this->user()->can('update', $consultationAppointmentAttendee);

    }

    public function rules()
    {
        return [
            //
            'consultation_appointment_attendee_id' => 'required|numeric'
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

        $consultationAppointmentAttendee = ConsultationAppointmentAttendee::findOrFail($this->consultation_appointment_attendee_id);

        $consultationAppointmentAttendee = $consultationAppointmentAttendee->updateModel($this);

        $response = new ConsultationAppointmentAttendeeResource($consultationAppointmentAttendee);

        event(new UpdateEvent($consultationAppointmentAttendee, $this->all(), $response));

        return $response;

    }

}
