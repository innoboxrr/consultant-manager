<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultantTeamMember;

use Innoboxrr\ConsultantManager\Models\ConsultantTeamMember;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultantTeamMemberResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultantTeamMember\Events\RestoreEvent;
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
        
        $consultantTeamMember = ConsultantTeamMember::withTrashed()->findOrFail($this->consultant_team_member_id);
        
        return $this->user()->can('restore', $consultantTeamMember);

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

        $consultantTeamMember->restoreModel();

        $response = new ConsultantTeamMemberResource($consultantTeamMember);

        event(new RestoreEvent($consultantTeamMember, $this->all(), $response));

        return $response;

    }
    
}
