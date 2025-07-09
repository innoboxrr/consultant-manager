<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsulteeRecordItem;

use Innoboxrr\ConsultantManager\Models\ConsulteeRecordItem;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsulteeRecordItemResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsulteeRecordItem\Events\UpdateEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $consulteeRecordItem = ConsulteeRecordItem::findOrFail($this->consultee_record_item_id);

        return $this->user()->can('update', $consulteeRecordItem);

    }

    public function rules()
    {
        return [
            //
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

        $consulteeRecordItem = $consulteeRecordItem->updateModel($this);

        $response = new ConsulteeRecordItemResource($consulteeRecordItem);

        event(new UpdateEvent($consulteeRecordItem, $this->all(), $response));

        return $response;

    }

}
