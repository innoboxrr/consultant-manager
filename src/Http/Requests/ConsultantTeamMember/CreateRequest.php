<?php

namespace Innoboxrr\ConsultantManager\Http\Requests\ConsultantTeamMember;

use Innoboxrr\ConsultantManager\Models\ConsultantTeamMember;
use Innoboxrr\ConsultantManager\Http\Resources\Models\ConsultantTeamMemberResource;
use Innoboxrr\ConsultantManager\Http\Events\ConsultantTeamMember\Events\CreateEvent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        //
    }

    public function authorize()
    {

        return $this->user()->can('create', ConsultantTeamMember::class);

    }

    public function rules()
    {
        return [
            //
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

        $consultantTeamMember = (new ConsultantTeamMember)->createModel($this);

        $response = new ConsultantTeamMemberResource($consultantTeamMember);

        event(new CreateEvent($consultantTeamMember, $this->all(), $response));

        return $response;

    }
    
}
