<?php

namespace Innoboxrr\ConsultantManager\Policies;

use App\Models\User;
use Innoboxrr\ConsultantManager\Models\ConsultationService;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConsultationServicePolicy
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

    public function view(User $user, ConsultationService $consultationService)
    {
        return false;
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, ConsultationService $consultationService)
    {
        return false;
    }

    public function delete(User $user, ConsultationService $consultationService)
    {
        return false;
    }

    public function restore(User $user, ConsultationService $consultationService)
    {
        return false;
    }

    public function forceDelete(User $user, ConsultationService $consultationService)
    {
        return false;
    }

    public function export(User $user)
    {
        return false;
    }

}
