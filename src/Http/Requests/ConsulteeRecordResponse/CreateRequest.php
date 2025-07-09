<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsulteeRecordResponse;

use Innoboxrr\ConsultantManager\Models\ConsulteeRecordResponse;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsulteeRecordResponseResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsulteeRecordResponse\Events\CreateEvent;
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

        return $this->user()->can('create', ConsulteeRecordResponse::class);

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

        $consulteeRecordResponse = (new ConsulteeRecordResponse)->createModel($this);

        $response = new ConsulteeRecordResponseResource($consulteeRecordResponse);

        event(new CreateEvent($consulteeRecordResponse, $this->all(), $response));

        return $response;

    }
    
}
