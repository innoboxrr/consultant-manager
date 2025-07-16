<?php

namespace Innoboxrr\ConsultantManager\Policies;

use App\Models\User;
use Innoboxrr\ConsultantManager\Models\ConsultantAvailability;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConsultantAvailabilityPolicy
{
    use HandlesAuthorization;

    /**
     * Permitir todo a admins, excepto habilidades explícitamente excluidas.
     */
    public function before($user, $ability)
    {
        $exceptAbilities = config('consultant-manager.permissions.consultantavailability-except-abilities', []);

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
        return $this->callUserMethod($user, 'indexConsultantAvailability');
    }

    public function viewAny(User $user)
    {
        return $this->callUserMethod($user, 'viewAnyConsultantAvailability');
    }

    public function view(User $user, ConsultantAvailability $consultantAvailability)
    {
        return $this->callUserMethod($user, 'viewConsultantAvailability', $consultantAvailability);
    }

    public function create(User $user)
    {
        return $this->callUserMethod($user, 'createConsultantAvailability');
    }

    public function update(User $user, ConsultantAvailability $consultantAvailability)
    {
        return $this->callUserMethod($user, 'updateConsultantAvailability', $consultantAvailability);
    }

    public function delete(User $user, ConsultantAvailability $consultantAvailability)
    {
        return $this->callUserMethod($user, 'deleteConsultantAvailability', $consultantAvailability);
    }

    public function restore(User $user, ConsultantAvailability $consultantAvailability)
    {
        return $this->callUserMethod($user, 'restoreConsultantAvailability', $consultantAvailability);
    }

    public function forceDelete(User $user, ConsultantAvailability $consultantAvailability)
    {
        return $this->callUserMethod($user, 'forceDeleteConsultantAvailability', $consultantAvailability);
    }

    public function export(User $user)
    {
        return $this->callUserMethod($user, 'exportConsultantAvailability');
    }
}
