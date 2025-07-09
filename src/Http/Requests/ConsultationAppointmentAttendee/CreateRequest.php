<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationAppointmentAttendee;

use Innoboxrr\ConsultantManager\Models\ConsultationAppointmentAttendee;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationAppointmentAttendeeResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationAppointmentAttendee\Events\CreateEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        return $this->user()->can('create', ConsultationAppointmentAttendee::class);

    }

    public function rules()
    {
        return [
            //
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

        $consultationAppointmentAttendee = (new ConsultationAppointmentAttendee)->createModel($this);

        $response = new ConsultationAppointmentAttendeeResource($consultationAppointmentAttendee);

        event(new CreateEvent($consultationAppointmentAttendee, $this->all(), $response));

        return $response;

    }
    
}
