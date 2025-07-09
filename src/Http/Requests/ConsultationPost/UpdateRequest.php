<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationPost;

use Innoboxrr\ConsultantManager\Models\ConsultationPost;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationPostResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationPost\Events\UpdateEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $consultationPost = ConsultationPost::findOrFail($this->consultation_post_id);

        return $this->user()->can('update', $consultationPost);

    }

    public function rules()
    {
        return [
            //
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

        $consultationPost = ConsultationPost::findOrFail($this->consultation_post_id);

        $consultationPost = $consultationPost->updateModel($this);

        $response = new ConsultationPostResource($consultationPost);

        event(new UpdateEvent($consultationPost, $this->all(), $response));

        return $response;

    }

}
