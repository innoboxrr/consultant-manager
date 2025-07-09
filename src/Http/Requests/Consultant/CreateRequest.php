<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\Consultant;

use Innoboxrr\ConsultantManager\Models\Consultant;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultantResource;
use Innoboxrr\ConsultantManager\Http\Events\Consultant\Events\CreateEvent;
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

        return $this->user()->can('create', Consultant::class);

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

        $consultant = (new Consultant)->createModel($this);

        $response = new ConsultantResource($consultant);

        event(new CreateEvent($consultant, $this->all(), $response));

        return $response;

    }
    
}
