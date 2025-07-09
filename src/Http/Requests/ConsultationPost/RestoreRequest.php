<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationPost;

use Innoboxrr\ConsultantManager\Models\ConsultationPost;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationPostResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationPost\Events\RestoreEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RestoreRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $consultationPost = ConsultationPost::withTrashed()->findOrFail($this->consultation_post_id);
        
        return $this->user()->can('restore', $consultationPost);

    }

    public function rules()
    {
        return [
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

        $consultationPost = ConsultationPost::withTrashed()->findOrFail($this->consultation_post_id);

        $consultationPost->restoreModel();

        $response = new ConsultationPostResource($consultationPost);

        event(new RestoreEvent($consultationPost, $this->all(), $response));

        return $response;

    }
    
}
