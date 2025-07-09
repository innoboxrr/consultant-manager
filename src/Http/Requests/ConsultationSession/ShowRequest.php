<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationSession;

use Innoboxrr\ConsultantManager\Models\ConsultationSession;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationSessionResource;
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

        $consultationSession = ConsultationSession::findOrFail($this->consultation_session_id);

        return $this->user()->can('view', $consultationSession);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(ConsultationSession::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(ConsultationSession::$loadable_counts)
            ],
            'consultation_session_id' => 'required|numeric'
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

        $consultationSession = ConsultationSession::where('id', $this->consultation_session_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new ConsultationSessionResource($consultationSession);

    }
    
}
