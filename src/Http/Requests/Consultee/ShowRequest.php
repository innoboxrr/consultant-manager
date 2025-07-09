<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\Consultee;

use Innoboxrr\ConsultantManager\Models\Consultee;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsulteeResource;
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

        $consultee = Consultee::findOrFail($this->consultee_id);

        return $this->user()->can('view', $consultee);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(Consultee::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(Consultee::$loadable_counts)
            ],
            'consultee_id' => 'required|numeric'
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

        $consultee = Consultee::where('id', $this->consultee_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new ConsulteeResource($consultee);

    }
    
}
