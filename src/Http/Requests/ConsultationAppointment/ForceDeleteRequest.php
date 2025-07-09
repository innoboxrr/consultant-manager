<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationAppointment;

use Innoboxrr\ConsultantManager\Models\ConsultationAppointment;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationAppointmentResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationAppointment\Events\ForceDeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $consultationAppointment = ConsultationAppointment::withTrashed()->findOrFail($this->consultation_appointment_id);
        
        return $this->user()->can('forceDelete', $consultationAppointment);

    }

    public function rules()
    {
        return [
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

        $consultationAppointment = ConsultationAppointment::withTrashed()->findOrFail($this->consultation_appointment_id);

        $consultationAppointment->forceDeleteModel();

        $response = new ConsultationAppointmentResource($consultationAppointment);

        event(new ForceDeleteEvent($consultationAppointment, $this->all(), $response));

        return $response;

    }
    
}
