<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\Consultee;

use Innoboxrr\ConsultantManager\Models\Consultee;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsulteeResource;
use Innoboxrr\ConsultantManager\Http\Events\Consultee\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $consultee = Consultee::findOrFail($this->consultee_id);

        return $this->user()->can('delete', $consultee);

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

        $consultee = Consultee::findOrFail($this->consultee_id);

        $consultee->deleteModel();

        $response = new ConsulteeResource($consultee);

        event(new DeleteEvent($consultee, $this->all(), $response));

        return $response;

    }
    
}
