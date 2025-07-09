<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\Consultant;

use Innoboxrr\ConsultantManager\Models\Consultant;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultantResource;
use Innoboxrr\ConsultantManager\Http\Events\Consultant\Events\RestoreEvent;
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
        
        $consultant = Consultant::withTrashed()->findOrFail($this->consultant_id);
        
        return $this->user()->can('restore', $consultant);

    }

    public function rules()
    {
        return [
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

        $consultant = Consultant::withTrashed()->findOrFail($this->consultant_id);

        $consultant->restoreModel();

        $response = new ConsultantResource($consultant);

        event(new RestoreEvent($consultant, $this->all(), $response));

        return $response;

    }
    
}
