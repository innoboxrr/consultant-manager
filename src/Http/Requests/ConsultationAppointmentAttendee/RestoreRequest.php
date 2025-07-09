<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationAppointmentAttendee;

use Innoboxrr\ConsultantManager\Models\ConsultationAppointmentAttendee;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationAppointmentAttendeeResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationAppointmentAttendee\Events\RestoreEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RestoreRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $consultationAppointmentAttendee = ConsultationAppointmentAttendee::withTrashed()->findOrFail($this->consultation_appointment_attendee_id);
        
        return $this->user()->can('restore', $consultationAppointmentAttendee);

    }

    public function rules()
    {
        return [
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

        $consultationAppointmentAttendee = ConsultationAppointmentAttendee::withTrashed()->findOrFail($this->consultation_appointment_attendee_id);

        $consultationAppointmentAttendee->restoreModel();

        $response = new ConsultationAppointmentAttendeeResource($consultationAppointmentAttendee);

        event(new RestoreEvent($consultationAppointmentAttendee, $this->all(), $response));

        return $response;

    }
    
}
