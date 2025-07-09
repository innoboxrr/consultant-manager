<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationAppointment;

use Innoboxrr\ConsultantManager\Models\ConsultationAppointment;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationAppointmentResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationAppointment\Events\CreateEvent;
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

        return $this->user()->can('create', ConsultationAppointment::class);

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

        $consultationAppointment = (new ConsultationAppointment)->createModel($this);

        $response = new ConsultationAppointmentResource($consultationAppointment);

        event(new CreateEvent($consultationAppointment, $this->all(), $response));

        return $response;

    }
    
}
