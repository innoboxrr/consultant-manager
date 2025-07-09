<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsulteeRecordItem;

use Innoboxrr\ConsultantManager\Models\ConsulteeRecordItem;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsulteeRecordItemResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsulteeRecordItem\Events\CreateEvent;
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

        return $this->user()->can('create', ConsulteeRecordItem::class);

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

        $consulteeRecordItem = (new ConsulteeRecordItem)->createModel($this);

        $response = new ConsulteeRecordItemResource($consulteeRecordItem);

        event(new CreateEvent($consulteeRecordItem, $this->all(), $response));

        return $response;

    }
    
}
