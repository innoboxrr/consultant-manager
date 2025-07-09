<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationPrice;

use Innoboxrr\ConsultantManager\Models\ConsultationPrice;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationPriceResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationPrice\Events\CreateEvent;
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

        return $this->user()->can('create', ConsultationPrice::class);

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

        $consultationPrice = (new ConsultationPrice)->createModel($this);

        $response = new ConsultationPriceResource($consultationPrice);

        event(new CreateEvent($consultationPrice, $this->all(), $response));

        return $response;

    }
    
}
