<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\Consultee;

use Innoboxrr\ConsultantManager\Models\Consultee;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsulteeResource;
use Innoboxrr\ConsultantManager\Http\Events\Consultee\Events\RestoreEvent;
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
        
        $consultee = Consultee::withTrashed()->findOrFail($this->consultee_id);
        
        return $this->user()->can('restore', $consultee);

    }

    public function rules()
    {
        return [
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

        $consultee = Consultee::withTrashed()->findOrFail($this->consultee_id);

        $consultee->restoreModel();

        $response = new ConsulteeResource($consultee);

        event(new RestoreEvent($consultee, $this->all(), $response));

        return $response;

    }
    
}
