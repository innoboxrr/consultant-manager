<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationPrice;

use Innoboxrr\ConsultantManager\Models\ConsultationPrice;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationPriceResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationPrice\Events\UpdateEvent;
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
        
        $consultationPrice = ConsultationPrice::findOrFail($this->consultation_price_id);

        return $this->user()->can('update', $consultationPrice);

    }

    public function rules()
    {
        return [
            //
            'consultation_price_id' => 'required|numeric'
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

        $consultationPrice = ConsultationPrice::findOrFail($this->consultation_price_id);

        $consultationPrice = $consultationPrice->updateModel($this);

        $response = new ConsultationPriceResource($consultationPrice);

        event(new UpdateEvent($consultationPrice, $this->all(), $response));

        return $response;

    }

}
