<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\Consultant;

use Innoboxrr\ConsultantManager\Models\Consultant;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultantResource;
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

        $consultant = Consultant::findOrFail($this->consultant_id);

        return $this->user()->can('view', $consultant);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(Consultant::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(Consultant::$loadable_counts)
            ],
            'consultant_id' => 'required|numeric'
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

        $consultant = Consultant::where('id', $this->consultant_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new ConsultantResource($consultant);

    }
    
}
