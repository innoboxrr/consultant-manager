<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultantTeamMember;

use Innoboxrr\ConsultantManager\Models\ConsultantTeamMember;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultantTeamMemberResource;
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

        $consultantTeamMember = ConsultantTeamMember::findOrFail($this->consultant_team_member_id);

        return $this->user()->can('view', $consultantTeamMember);

    }

    public function rules()
    {
        return [
            'load_relations' => [
                'nullable',
                'array',
                Rule::in(ConsultantTeamMember::$loadable_relations)
            ],
            'load_counts' => [
                'nullable',
                'array',
                Rule::in(ConsultantTeamMember::$loadable_counts)
            ],
            'consultant_team_member_id' => 'required|numeric'
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

        $consultantTeamMember = ConsultantTeamMember::where('id', $this->consultant_team_member_id)
            ->with($this->load_relations ?? [])
            ->withCount($this->load_counts ?? [])
            ->firstOrFail();

        return new ConsultantTeamMemberResource($consultantTeamMember);

    }
    
}
