<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsulteeRecord;

use Innoboxrr\ConsultantManager\Models\ConsulteeRecord;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsulteeRecordResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsulteeRecord\Events\ForceDeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $consulteeRecord = ConsulteeRecord::withTrashed()->findOrFail($this->consultee_record_id);
        
        return $this->user()->can('forceDelete', $consulteeRecord);

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

        $consulteeRecord->forceDeleteModel();

        $response = new ConsulteeRecordResource($consulteeRecord);

        event(new ForceDeleteEvent($consulteeRecord, $this->all(), $response));

        return $response;

    }
    
}
