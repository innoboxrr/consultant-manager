<?php

namespace Innoboxrr\ConsultantManager\Policies;

use App\Models\User;
use Innoboxrr\ConsultantManager\Models\ConsultationSessionService;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConsultationSessionServicePolicy
{
    use HandlesAuthorization;

    /**
     * Permitir todo a admins, excepto habilidades explícitamente excluidas.
     */
    public function before($user, $ability)
    {
        $exceptAbilities = config('consultant-manager.permissions.consultationsessionservice-except-abilities', []);

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
        return $this->callUserMethod($user, 'indexConsultationSessionService');
    }

    public function viewAny(User $user)
    {
        return $this->callUserMethod($user, 'viewAnyConsultationSessionService');
    }

    public function view(User $user, ConsultationSessionService $consultationSessionService)
    {
        return $this->callUserMethod($user, 'viewConsultationSessionService', $consultationSessionService);
    }

    public function create(User $user)
    {
        return $this->callUserMethod($user, 'createConsultationSessionService');
    }

    public function update(User $user, ConsultationSessionService $consultationSessionService)
    {
        return $this->callUserMethod($user, 'updateConsultationSessionService', $consultationSessionService);
    }

    public function delete(User $user, ConsultationSessionService $consultationSessionService)
    {
        return $this->callUserMethod($user, 'deleteConsultationSessionService', $consultationSessionService);
    }

    public function restore(User $user, ConsultationSessionService $consultationSessionService)
    {
        return $this->callUserMethod($user, 'restoreConsultationSessionService', $consultationSessionService);
    }

    public function forceDelete(User $user, ConsultationSessionService $consultationSessionService)
    {
        return $this->callUserMethod($user, 'forceDeleteConsultationSessionService', $consultationSessionService);
    }

    public function export(User $user)
    {
        return $this->callUserMethod($user, 'exportConsultationSessionService');
    }
}
