<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsulteeRecordResponse;

use Innoboxrr\ConsultantManager\Models\ConsulteeRecordResponse;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsulteeRecordResponseResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsulteeRecordResponse\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $consulteeRecordResponse = ConsulteeRecordResponse::findOrFail($this->consultee_record_response_id);

        return $this->user()->can('delete', $consulteeRecordResponse);

    }

    public function rules()
    {
        return [
            'consultee_record_response_id' => 'required|numeric'
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

        $consulteeRecordResponse = ConsulteeRecordResponse::findOrFail($this->consultee_record_response_id);

        $consulteeRecordResponse->deleteModel();

        $response = new ConsulteeRecordResponseResource($consulteeRecordResponse);

        event(new DeleteEvent($consulteeRecordResponse, $this->all(), $response));

        return $response;

    }
    
}
