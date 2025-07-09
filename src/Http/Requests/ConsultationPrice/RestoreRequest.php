<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationPrice;

use Innoboxrr\ConsultantManager\Models\ConsultationPrice;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationPriceResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationPrice\Events\RestoreEvent;
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
        
        $consultationPrice = ConsultationPrice::withTrashed()->findOrFail($this->consultation_price_id);
        
        return $this->user()->can('restore', $consultationPrice);

    }

    public function rules()
    {
        return [
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

        $consultationPrice = ConsultationPrice::withTrashed()->findOrFail($this->consultation_price_id);

        $consultationPrice->restoreModel();

        $response = new ConsultationPriceResource($consultationPrice);

        event(new RestoreEvent($consultationPrice, $this->all(), $response));

        return $response;

    }
    
}
