<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationIntakeForm;

use Innoboxrr\ConsultantManager\Models\ConsultationIntakeForm;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationIntakeFormResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationIntakeForm\Events\RestoreEvent;
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
        
        $consultationIntakeForm = ConsultationIntakeForm::withTrashed()->findOrFail($this->consultation_intake_form_id);
        
        return $this->user()->can('restore', $consultationIntakeForm);

    }

    public function rules()
    {
        return [
            'consultation_intake_form_id' => 'required|numeric'
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

        $consultationIntakeForm = ConsultationIntakeForm::withTrashed()->findOrFail($this->consultation_intake_form_id);

        $consultationIntakeForm->restoreModel();

        $response = new ConsultationIntakeFormResource($consultationIntakeForm);

        event(new RestoreEvent($consultationIntakeForm, $this->all(), $response));

        return $response;

    }
    
}
