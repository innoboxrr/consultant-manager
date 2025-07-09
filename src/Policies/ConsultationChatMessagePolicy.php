<?php

namespace Innoboxrr\ConsultantManager\Policies;

use App\Models\User;
use Innoboxrr\ConsultantManager\Models\ConsultationChatMessage;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConsultationChatMessagePolicy
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

    public function view(User $user, ConsultationChatMessage $consultationChatMessage)
    {
        return false;
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, ConsultationChatMessage $consultationChatMessage)
    {
        return false;
    }

    public function delete(User $user, ConsultationChatMessage $consultationChatMessage)
    {
        return false;
    }

    public function restore(User $user, ConsultationChatMessage $consultationChatMessage)
    {
        return false;
    }

    public function forceDelete(User $user, ConsultationChatMessage $consultationChatMessage)
    {
        return false;
    }

    public function export(User $user)
    {
        return false;
    }

}
