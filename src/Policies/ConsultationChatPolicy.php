<?php

namespace Innoboxrr\ConsultantManager\Policies;

use App\Models\User;
use Innoboxrr\ConsultantManager\Models\ConsultationChat;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConsultationChatPolicy
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

    public function view(User $user, ConsultationChat $consultationChat)
    {
        return false;
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, ConsultationChat $consultationChat)
    {
        return false;
    }

    public function delete(User $user, ConsultationChat $consultationChat)
    {
        return false;
    }

    public function restore(User $user, ConsultationChat $consultationChat)
    {
        return false;
    }

    public function forceDelete(User $user, ConsultationChat $consultationChat)
    {
        return false;
    }

    public function export(User $user)
    {
        return false;
    }

}
