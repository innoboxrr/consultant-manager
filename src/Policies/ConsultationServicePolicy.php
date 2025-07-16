<?php

namespace Innoboxrr\ConsultantManager\Policies;

use App\Models\User;
use Innoboxrr\ConsultantManager\Models\ConsultationService;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConsultationServicePolicy
{
    use HandlesAuthorization;

    /**
     * Permitir todo a admins, excepto habilidades explícitamente excluidas.
     */
    public function before($user, $ability)
    {
        $exceptAbilities = config('consultant-manager.permissions.consultationservice-except-abilities', []);

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
        return $this->callUserMethod($user, 'indexConsultationService');
    }

    public function viewAny(User $user)
    {
        return $this->callUserMethod($user, 'viewAnyConsultationService');
    }

    public function view(User $user, ConsultationService $consultationService)
    {
        return $this->callUserMethod($user, 'viewConsultationService', $consultationService);
    }

    public function create(User $user)
    {
        return $this->callUserMethod($user, 'createConsultationService');
    }

    public function update(User $user, ConsultationService $consultationService)
    {
        return $this->callUserMethod($user, 'updateConsultationService', $consultationService);
    }

    public function delete(User $user, ConsultationService $consultationService)
    {
        return $this->callUserMethod($user, 'deleteConsultationService', $consultationService);
    }

    public function restore(User $user, ConsultationService $consultationService)
    {
        return $this->callUserMethod($user, 'restoreConsultationService', $consultationService);
    }

    public function forceDelete(User $user, ConsultationService $consultationService)
    {
        return $this->callUserMethod($user, 'forceDeleteConsultationService', $consultationService);
    }

    public function export(User $user)
    {
        return $this->callUserMethod($user, 'exportConsultationService');
    }
}
