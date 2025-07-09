<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationAppointmentAttendee;

use Innoboxrr\ConsultantManager\Models\ConsultationAppointmentAttendee;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationAppointmentAttendeeResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationAppointmentAttendee\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $consultationAppointmentAttendee = ConsultationAppointmentAttendee::findOrFail($this->consultation_appointment_attendee_id);

        return $this->user()->can('delete', $consultationAppointmentAttendee);

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

        $consultationAppointmentAttendee = ConsultationAppointmentAttendee::findOrFail($this->consultation_appointment_attendee_id);

        $consultationAppointmentAttendee->deleteModel();

        $response = new ConsultationAppointmentAttendeeResource($consultationAppointmentAttendee);

        event(new DeleteEvent($consultationAppointmentAttendee, $this->all(), $response));

        return $response;

    }
    
}
