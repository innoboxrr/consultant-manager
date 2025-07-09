<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationPost;

use Innoboxrr\ConsultantManager\Models\ConsultationPost;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationPostResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationPost\Events\ForceDeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $consultationPost = ConsultationPost::withTrashed()->findOrFail($this->consultation_post_id);
        
        return $this->user()->can('forceDelete', $consultationPost);

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

        $consultationPost->forceDeleteModel();

        $response = new ConsultationPostResource($consultationPost);

        event(new ForceDeleteEvent($consultationPost, $this->all(), $response));

        return $response;

    }
    
}
