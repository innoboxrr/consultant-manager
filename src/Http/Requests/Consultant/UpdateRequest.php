<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\Consultant;

use Innoboxrr\ConsultantManager\Models\Consultant;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultantResource;
use Innoboxrr\ConsultantManager\Http\Events\Consultant\Events\UpdateEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $consultant = Consultant::findOrFail($this->consultant_id);

        return $this->user()->can('update', $consultant);

    }

    public function rules()
    {
        return [
            //
            'consultant_id' => 'required|numeric'
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

        $consultant = Consultant::findOrFail($this->consultant_id);

        $consultant = $consultant->updateModel($this);

        $response = new ConsultantResource($consultant);

        event(new UpdateEvent($consultant, $this->all(), $response));

        return $response;

    }

}
