<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationAdvice;

use Innoboxrr\ConsultantManager\Models\ConsultationAdvice;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationAdviceResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Innoboxrr\SearchSurge\Search\Builder;

class IndexRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        return $this->user()->can('index', ConsultationAdvice::class);
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

        $builder = new Builder();

        $query = $builder->get(ConsultationAdvice::class, $this->all());

        return ConsultationAdviceResource::collection($query);

    }
}
