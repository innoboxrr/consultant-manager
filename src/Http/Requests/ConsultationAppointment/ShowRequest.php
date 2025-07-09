<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationAppointment;

use Innoboxrr\ConsultantManager\Models\ConsultationAppointment;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationAppointmentResource;
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

        $consultationAppointment = ConsultationAppointment::findOrFail($this->consultation_appointment_id);

        return $this->user()->can('view', $consultationAppointment);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(ConsultationAppointment::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(ConsultationAppointment::$loadable_counts)
            ],
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

        $consultationAppointment = ConsultationAppointment::where('id', $this->consultation_appointment_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new ConsultationAppointmentResource($consultationAppointment);

    }
    
}
