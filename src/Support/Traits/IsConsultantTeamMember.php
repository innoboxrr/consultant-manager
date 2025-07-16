<?php

namespace Innoboxrr\ConsultantManager\Support\Traits;

use Innoboxrr\ConsultantManager\Models\ConsultantTeamMember;

trait IsConsultantTeamMember
{
    public function consultantTeamMembers()
    {
        return $this->hasMany(ConsultantTeamMember::class);
    }

    public function isConsultantTeamMember()
    {
        return $this->consultantTeamMembers()->exists();
    }
}