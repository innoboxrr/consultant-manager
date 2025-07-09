<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationPrice;

use Innoboxrr\ConsultantManager\Models\ConsultationPrice;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationPriceResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationPrice\Events\ForceDeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $consultationPrice = ConsultationPrice::withTrashed()->findOrFail($this->consultation_price_id);
        
        return $this->user()->can('forceDelete', $consultationPrice);

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

        $consultationPrice->forceDeleteModel();

        $response = new ConsultationPriceResource($consultationPrice);

        event(new ForceDeleteEvent($consultationPrice, $this->all(), $response));

        return $response;

    }
    
}
