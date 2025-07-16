<?php

namespace Innoboxrr\ConsultantManager\Policies;

use App\Models\User;
use Innoboxrr\ConsultantManager\Models\ConsultationChatMessage;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConsultationChatMessagePolicy
{
    use HandlesAuthorization;

    /**
     * Permitir todo a admins, excepto habilidades explícitamente excluidas.
     */
    public function before($user, $ability)
    {
        $exceptAbilities = config('consultant-manager.permissions.consultationchatmessage-except-abilities', []);

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
        return $this->callUserMethod($user, 'indexConsultationChatMessage');
    }

    public function viewAny(User $user)
    {
        return $this->callUserMethod($user, 'viewAnyConsultationChatMessage');
    }

    public function view(User $user, ConsultationChatMessage $consultationChatMessage)
    {
        return $this->callUserMethod($user, 'viewConsultationChatMessage', $consultationChatMessage);
    }

    public function create(User $user)
    {
        return $this->callUserMethod($user, 'createConsultationChatMessage');
    }

    public function update(User $user, ConsultationChatMessage $consultationChatMessage)
    {
        return $this->callUserMethod($user, 'updateConsultationChatMessage', $consultationChatMessage);
    }

    public function delete(User $user, ConsultationChatMessage $consultationChatMessage)
    {
        return $this->callUserMethod($user, 'deleteConsultationChatMessage', $consultationChatMessage);
    }

    public function restore(User $user, ConsultationChatMessage $consultationChatMessage)
    {
        return $this->callUserMethod($user, 'restoreConsultationChatMessage', $consultationChatMessage);
    }

    public function forceDelete(User $user, ConsultationChatMessage $consultationChatMessage)
    {
        return $this->callUserMethod($user, 'forceDeleteConsultationChatMessage', $consultationChatMessage);
    }

    public function export(User $user)
    {
        return $this->callUserMethod($user, 'exportConsultationChatMessage');
    }
}
