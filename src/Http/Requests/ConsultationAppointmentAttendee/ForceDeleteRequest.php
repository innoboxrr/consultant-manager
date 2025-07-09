<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationAppointmentAttendee;

use Innoboxrr\ConsultantManager\Models\ConsultationAppointmentAttendee;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationAppointmentAttendeeResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationAppointmentAttendee\Events\ForceDeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $consultationAppointmentAttendee = ConsultationAppointmentAttendee::withTrashed()->findOrFail($this->consultation_appointment_attendee_id);
        
        return $this->user()->can('forceDelete', $consultationAppointmentAttendee);

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

        $consultationAppointmentAttendee->forceDeleteModel();

        $response = new ConsultationAppointmentAttendeeResource($consultationAppointmentAttendee);

        event(new ForceDeleteEvent($consultationAppointmentAttendee, $this->all(), $response));

        return $response;

    }
    
}
