<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultantAvailability;

use Innoboxrr\ConsultantManager\Models\ConsultantAvailability;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultantAvailabilityResource;
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

        $consultantAvailability = ConsultantAvailability::findOrFail($this->consultant_availability_id);

        return $this->user()->can('view', $consultantAvailability);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(ConsultantAvailability::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(ConsultantAvailability::$loadable_counts)
            ],
            'consultant_availability_id' => 'required|numeric'
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

        $consultantAvailability = ConsultantAvailability::where('id', $this->consultant_availability_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new ConsultantAvailabilityResource($consultantAvailability);

    }
    
}
