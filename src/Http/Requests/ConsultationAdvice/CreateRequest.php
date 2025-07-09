<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationAdvice;

use Innoboxrr\ConsultantManager\Models\ConsultationAdvice;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationAdviceResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationAdvice\Events\CreateEvent;
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

        return $this->user()->can('create', ConsultationAdvice::class);

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

        $consultationAdvice = (new ConsultationAdvice)->createModel($this);

        $response = new ConsultationAdviceResource($consultationAdvice);

        event(new CreateEvent($consultationAdvice, $this->all(), $response));

        return $response;

    }
    
}
