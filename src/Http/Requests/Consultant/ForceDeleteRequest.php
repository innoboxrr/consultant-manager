<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\Consultant;

use Innoboxrr\ConsultantManager\Models\Consultant;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultantResource;
use Innoboxrr\ConsultantManager\Http\Events\Consultant\Events\ForceDeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $consultant = Consultant::withTrashed()->findOrFail($this->consultant_id);
        
        return $this->user()->can('forceDelete', $consultant);

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

        $consultant->forceDeleteModel();

        $response = new ConsultantResource($consultant);

        event(new ForceDeleteEvent($consultant, $this->all(), $response));

        return $response;

    }
    
}
