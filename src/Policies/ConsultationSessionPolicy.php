<?php

namespace Innoboxrr\ConsultantManager\Policies;

use App\Models\User;
use Innoboxrr\ConsultantManager\Models\ConsultationSession;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConsultationSessionPolicy
{
    use HandlesAuthorization;

    /**
     * Permitir todo a admins, excepto habilidades explícitamente excluidas.
     */
    public function before($user, $ability)
    {
        $exceptAbilities = config('consultant-manager.permissions.consultationsession-except-abilities', []);

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
        return $this->callUserMethod($user, 'indexConsultationSession');
    }

    public function viewAny(User $user)
    {
        return $this->callUserMethod($user, 'viewAnyConsultationSession');
    }

    public function view(User $user, ConsultationSession $consultationSession)
    {
        return $this->callUserMethod($user, 'viewConsultationSession', $consultationSession);
    }

    public function create(User $user)
    {
        return $this->callUserMethod($user, 'createConsultationSession');
    }

    public function update(User $user, ConsultationSession $consultationSession)
    {
        return $this->callUserMethod($user, 'updateConsultationSession', $consultationSession);
    }

    public function delete(User $user, ConsultationSession $consultationSession)
    {
        return $this->callUserMethod($user, 'deleteConsultationSession', $consultationSession);
    }

    public function restore(User $user, ConsultationSession $consultationSession)
    {
        return $this->callUserMethod($user, 'restoreConsultationSession', $consultationSession);
    }

    public function forceDelete(User $user, ConsultationSession $consultationSession)
    {
        return $this->callUserMethod($user, 'forceDeleteConsultationSession', $consultationSession);
    }

    public function export(User $user)
    {
        return $this->callUserMethod($user, 'exportConsultationSession');
    }
}
