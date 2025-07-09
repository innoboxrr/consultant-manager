<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\Consultee;

use Innoboxrr\ConsultantManager\Models\Consultee;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsulteeResource;
use Innoboxrr\ConsultantManager\Http\Events\Consultee\Events\ForceDeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $consultee = Consultee::withTrashed()->findOrFail($this->consultee_id);
        
        return $this->user()->can('forceDelete', $consultee);

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

        $consultee->forceDeleteModel();

        $response = new ConsulteeResource($consultee);

        event(new ForceDeleteEvent($consultee, $this->all(), $response));

        return $response;

    }
    
}
