<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationIntakeForm;

use Innoboxrr\ConsultantManager\Models\ConsultationIntakeForm;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationIntakeFormResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationIntakeForm\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $consultationIntakeForm = ConsultationIntakeForm::findOrFail($this->consultation_intake_form_id);

        return $this->user()->can('delete', $consultationIntakeForm);

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

        $consultationIntakeForm = ConsultationIntakeForm::findOrFail($this->consultation_intake_form_id);

        $consultationIntakeForm->deleteModel();

        $response = new ConsultationIntakeFormResource($consultationIntakeForm);

        event(new DeleteEvent($consultationIntakeForm, $this->all(), $response));

        return $response;

    }
    
}
