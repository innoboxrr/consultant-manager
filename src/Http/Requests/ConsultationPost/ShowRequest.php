<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationPost;

use Innoboxrr\ConsultantManager\Models\ConsultationPost;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationPostResource;
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

        $consultationPost = ConsultationPost::findOrFail($this->consultation_post_id);

        return $this->user()->can('view', $consultationPost);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(ConsultationPost::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(ConsultationPost::$loadable_counts)
            ],
            'consultation_post_id' => 'required|numeric'
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

        $consultationPost = ConsultationPost::where('id', $this->consultation_post_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new ConsultationPostResource($consultationPost);

    }
    
}
