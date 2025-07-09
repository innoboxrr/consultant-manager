<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationPayment;

use Innoboxrr\ConsultantManager\Models\ConsultationPayment;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationPaymentResource;
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

        $consultationPayment = ConsultationPayment::findOrFail($this->consultation_payment_id);

        return $this->user()->can('view', $consultationPayment);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(ConsultationPayment::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(ConsultationPayment::$loadable_counts)
            ],
            'consultation_payment_id' => 'required|numeric'
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

        $consultationPayment = ConsultationPayment::where('id', $this->consultation_payment_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new ConsultationPaymentResource($consultationPayment);

    }
    
}
