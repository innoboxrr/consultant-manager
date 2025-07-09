<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationPost;

use Innoboxrr\ConsultantManager\Models\ConsultationPost;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationPostResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationPost\Events\DeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        
        $consultationPost = ConsultationPost::findOrFail($this->consultation_post_id);

        return $this->user()->can('delete', $consultationPost);

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

        $consultationPost = ConsultationPost::findOrFail($this->consultation_post_id);

        $consultationPost->deleteModel();

        $response = new ConsultationPostResource($consultationPost);

        event(new DeleteEvent($consultationPost, $this->all(), $response));

        return $response;

    }
    
}
