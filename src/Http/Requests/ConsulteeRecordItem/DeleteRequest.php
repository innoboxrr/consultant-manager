<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsulteeRecordItem;

use Innoboxrr\ConsultantManager\Models\ConsulteeRecordItem;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsulteeRecordItemResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsulteeRecordItem\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $consulteeRecordItem = ConsulteeRecordItem::findOrFail($this->consultee_record_item_id);

        return $this->user()->can('delete', $consulteeRecordItem);

    }

    public function rules()
    {
        return [
            'consultee_record_item_id' => 'required|numeric'
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

        $consulteeRecordItem = ConsulteeRecordItem::findOrFail($this->consultee_record_item_id);

        $consulteeRecordItem->deleteModel();

        $response = new ConsulteeRecordItemResource($consulteeRecordItem);

        event(new DeleteEvent($consulteeRecordItem, $this->all(), $response));

        return $response;

    }
    
}
