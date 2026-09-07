<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationChat;

use Innoboxrr\ConsultantManager\Models\ConsultationChat;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationChatResource;
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
        return $this->user()->can('index', ConsultationChat::class);
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

        $query = $builder->get(ConsultationChat::class, $this->all());

        return ConsultationChatResource::collection($query);

    }
}
