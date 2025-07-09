<?php

namespace Innoboxrr\ConsultantManager\Policies;

use App\Models\User;
use Innoboxrr\ConsultantManager\Models\ConsultationPost;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConsultationPostPolicy
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

    public function view(User $user, ConsultationPost $consultationPost)
    {
        return false;
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, ConsultationPost $consultationPost)
    {
        return false;
    }

    public function delete(User $user, ConsultationPost $consultationPost)
    {
        return false;
    }

    public function restore(User $user, ConsultationPost $consultationPost)
    {
        return false;
    }

    public function forceDelete(User $user, ConsultationPost $consultationPost)
    {
        return false;
    }

    public function export(User $user)
    {
        return false;
    }

}
