<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationAppointmentAttendee;

use Innoboxrr\ConsultantManager\Models\ConsultationAppointmentAttendee;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationAppointmentAttendeeResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShowRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $consultationAppointmentAttendee = ConsultationAppointmentAttendee::findOrFail($this->consultation_appointment_attendee_id);

        return $this->user()->can('view', $consultationAppointmentAttendee);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(ConsultationAppointmentAttendee::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(ConsultationAppointmentAttendee::$loadable_counts)
            ],
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

        $consultationAppointmentAttendee = ConsultationAppointmentAttendee::where('id', $this->consultation_appointment_attendee_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new ConsultationAppointmentAttendeeResource($consultationAppointmentAttendee);

    }
    
}
