<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\Consultant;

use Innoboxrr\ConsultantManager\Models\Consultant;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultantResource;
use Innoboxrr\ConsultantManager\Http\Events\Consultant\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $consultant = Consultant::findOrFail($this->consultant_id);

        return $this->user()->can('delete', $consultant);

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

        $consultant = Consultant::findOrFail($this->consultant_id);

        $consultant->deleteModel();

        $response = new ConsultantResource($consultant);

        event(new DeleteEvent($consultant, $this->all(), $response));

        return $response;

    }
    
}
