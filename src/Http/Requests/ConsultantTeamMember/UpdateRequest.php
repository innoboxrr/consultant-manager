<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultantTeamMember;

use Innoboxrr\ConsultantManager\Models\ConsultantTeamMember;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultantTeamMemberResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultantTeamMember\Events\UpdateEvent;
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
        
        $consultantTeamMember = ConsultantTeamMember::findOrFail($this->consultant_team_member_id);

        return $this->user()->can('update', $consultantTeamMember);

    }

    public function rules()
    {
        return [
            //
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

        $consultantTeamMember = ConsultantTeamMember::findOrFail($this->consultant_team_member_id);

        $consultantTeamMember = $consultantTeamMember->updateModel($this);

        $response = new ConsultantTeamMemberResource($consultantTeamMember);

        event(new UpdateEvent($consultantTeamMember, $this->all(), $response));

        return $response;

    }

}
