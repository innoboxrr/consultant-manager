<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationIntakeForm;

use Innoboxrr\ConsultantManager\Models\ConsultationIntakeForm;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationIntakeFormResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationIntakeForm\Events\CreateEvent;
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

        return $this->user()->can('create', ConsultationIntakeForm::class);

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

        $consultationIntakeForm = (new ConsultationIntakeForm)->createModel($this);

        $response = new ConsultationIntakeFormResource($consultationIntakeForm);

        event(new CreateEvent($consultationIntakeForm, $this->all(), $response));

        return $response;

    }
    
}
