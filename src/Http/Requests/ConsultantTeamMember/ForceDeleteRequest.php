<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultantTeamMember;

use Innoboxrr\ConsultantManager\Models\ConsultantTeamMember;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultantTeamMemberResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultantTeamMember\Events\ForceDeleteEvent;
use Illuminate\Foundation\Http\FormRequest;

class ForceDeleteRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        $consultantTeamMember = ConsultantTeamMember::withTrashed()->findOrFail($this->consultant_team_member_id);
        
        return $this->user()->can('forceDelete', $consultantTeamMember);

    }

    public function rules()
    {
        return [
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

        $consultantTeamMember = ConsultantTeamMember::withTrashed()->findOrFail($this->consultant_team_member_id);

        $consultantTeamMember->forceDeleteModel();

        $response = new ConsultantTeamMemberResource($consultantTeamMember);

        event(new ForceDeleteEvent($consultantTeamMember, $this->all(), $response));

        return $response;

    }
    
}
