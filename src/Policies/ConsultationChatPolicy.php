<?php

namespace Innoboxrr\ConsultantManager\Policies;

use App\Models\User;
use Innoboxrr\ConsultantManager\Models\ConsultationChat;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConsultationChatPolicy
{
    use HandlesAuthorization;

    /**
     * Permitir todo a admins, excepto habilidades explícitamente excluidas.
     */
    public function before($user, $ability)
    {
        $exceptAbilities = config('consultant-manager.permissions.consultationchat-except-abilities', []);

        if (method_exists($user, 'isAdmin') && $user->isAdmin() && !in_array($ability, $exceptAbilities)) {
            return true;
        }
    }

    /**
     * Llamador central a métodos definidos en el usuario (usando traits).
     */
    protected function callUserMethod(User $user, string $method, ...$arguments): bool
    {
        return method_exists($user, $method) ? $user->{ $method }(...$arguments) : false;
    }

    public function index(User $user)
    {
        return $this->callUserMethod($user, 'indexConsultationChat');
    }

    public function viewAny(User $user)
    {
        return $this->callUserMethod($user, 'viewAnyConsultationChat');
    }

    public function view(User $user, ConsultationChat $consultationChat)
    {
        return $this->callUserMethod($user, 'viewConsultationChat', $consultationChat);
    }

    public function create(User $user)
    {
        return $this->callUserMethod($user, 'createConsultationChat');
    }

    public function update(User $user, ConsultationChat $consultationChat)
    {
        return $this->callUserMethod($user, 'updateConsultationChat', $consultationChat);
    }

    public function delete(User $user, ConsultationChat $consultationChat)
    {
        return $this->callUserMethod($user, 'deleteConsultationChat', $consultationChat);
    }

    public function restore(User $user, ConsultationChat $consultationChat)
    {
        return $this->callUserMethod($user, 'restoreConsultationChat', $consultationChat);
    }

    public function forceDelete(User $user, ConsultationChat $consultationChat)
    {
        return $this->callUserMethod($user, 'forceDeleteConsultationChat', $consultationChat);
    }

    public function export(User $user)
    {
        return $this->callUserMethod($user, 'exportConsultationChat');
    }
}
