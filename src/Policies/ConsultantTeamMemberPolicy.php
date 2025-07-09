<?php

namespace Innoboxrr\ConsultantManager\Policies;

use App\Models\User;
use Innoboxrr\ConsultantManager\Models\ConsultantTeamMember;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConsultantTeamMemberPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {

        $exceptAbilities = [];

        if($user->isAdmin() && !in_array($ability, $exceptAbilities)){
        
            return true;
            
        }

    }

    public function index(User $user)
    {
        return false;
    }

    public function viewAny(User $user)
    {
        return false;
    }

    public function view(User $user, ConsultantTeamMember $consultantTeamMember)
    {
        return false;
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, ConsultantTeamMember $consultantTeamMember)
    {
        return false;
    }

    public function delete(User $user, ConsultantTeamMember $consultantTeamMember)
    {
        return false;
    }

    public function restore(User $user, ConsultantTeamMember $consultantTeamMember)
    {
        return false;
    }

    public function forceDelete(User $user, ConsultantTeamMember $consultantTeamMember)
    {
        return false;
    }

    public function export(User $user)
    {
        return false;
    }

}
