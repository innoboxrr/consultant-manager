<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultationSessionService;

use Innoboxrr\ConsultantManager\Models\ConsultationSessionService;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultationSessionServiceResource;
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

        $consultationSessionService = ConsultationSessionService::findOrFail($this->consultation_session_service_id);

        return $this->user()->can('view', $consultationSessionService);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(ConsultationSessionService::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(ConsultationSessionService::$loadable_counts)
            ],
            'consultation_session_service_id' => 'required|numeric'
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

        $consultationSessionService = ConsultationSessionService::where('id', $this->consultation_session_service_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new ConsultationSessionServiceResource($consultationSessionService);

    }
    
}
