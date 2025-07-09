<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationPrice;

use Innoboxrr\ConsultantManager\Models\ConsultationPrice;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationPriceResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShowRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $consultationPrice = ConsultationPrice::findOrFail($this->consultation_price_id);

        return $this->user()->can('view', $consultationPrice);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(ConsultationPrice::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(ConsultationPrice::$loadable_counts)
            ],
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

        $consultationPrice = ConsultationPrice::where('id', $this->consultation_price_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new ConsultationPriceResource($consultationPrice);

    }
    
}
