<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationPost;

use Innoboxrr\ConsultantManager\Models\ConsultationPost;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationPostResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationPost\Events\CreateEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        return $this->user()->can('create', ConsultationPost::class);

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

        $consultationPost = (new ConsultationPost)->createModel($this);

        $response = new ConsultationPostResource($consultationPost);

        event(new CreateEvent($consultationPost, $this->all(), $response));

        return $response;

    }
    
}
