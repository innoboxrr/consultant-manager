<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsulteeRecord;

use Innoboxrr\ConsultantManager\Models\ConsulteeRecord;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsulteeRecordResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsulteeRecord\Events\RestoreEvent;
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
        
        $consulteeRecord = ConsulteeRecord::withTrashed()->findOrFail($this->consultee_record_id);
        
        return $this->user()->can('restore', $consulteeRecord);

    }

    public function rules()
    {
        return [
            'consultee_record_id' => 'required|numeric'
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

        $consulteeRecord = ConsulteeRecord::withTrashed()->findOrFail($this->consultee_record_id);

        $consulteeRecord->restoreModel();

        $response = new ConsulteeRecordResource($consulteeRecord);

        event(new RestoreEvent($consulteeRecord, $this->all(), $response));

        return $response;

    }
    
}
