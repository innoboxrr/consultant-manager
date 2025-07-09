<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\Consultee;

use Innoboxrr\ConsultantManager\Models\Consultee;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsulteeResource;
use Innoboxrr\ConsultantManager\Http\Events\Consultee\Events\UpdateEvent;
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
        
        $consultee = Consultee::findOrFail($this->consultee_id);

        return $this->user()->can('update', $consultee);

    }

    public function rules()
    {
        return [
            //
            'consultee_id' => 'required|numeric'
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

        $consultee = Consultee::findOrFail($this->consultee_id);

        $consultee = $consultee->updateModel($this);

        $response = new ConsulteeResource($consultee);

        event(new UpdateEvent($consultee, $this->all(), $response));

        return $response;

    }

}
