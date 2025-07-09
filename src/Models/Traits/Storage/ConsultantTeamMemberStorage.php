<?php

namespace Innoboxrr\ConsultantManager\Models\Traits\Storage;

// use Innoboxrr\ConsultantManager\Models\ConsultantTeamMemberMeta;

trait ConsultantTeamMemberStorage
{

    public function createModel($request)
    {

        $consultantTeamMember = $this->create($request->only($this->creatable));

        return $consultantTeamMember;

    }

    public function updateModel($request)
    {
     
        $this->update($request->only($this->updatable));

        return $this;

    }

    /*
    public function updateModelMetas($request)
    {

        $this->update_metas($request, ConsultantTeamMemberMeta::class, 'consultant_team_member_id')->updatePayload();

        return $this;

    }
    */

    public function deleteModel()
    {

        $this->delete();

    }

    public function restoreModel()
    {

        $this->restore();

    }

    public function forceDeleteModel()
    {

        abort(403);

        $this->forceDelete();
        
    }

}