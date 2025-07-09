<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationIntakeForm;

use Innoboxrr\ConsultantManager\Models\ConsultationIntakeForm;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationIntakeFormResource;
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
        return $this->user()->can('index', ConsultationIntakeForm::class);
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

        $query = $builder->get(ConsultationIntakeForm::class, $this->all());

        return ConsultationIntakeFormResource::collection($query);

    }
}
