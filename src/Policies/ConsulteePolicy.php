<?php

namespace Innoboxrr\ConsultantManager\Policies;

use App\Models\User;
use Innoboxrr\ConsultantManager\Models\Consultee;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConsulteePolicy
{
    use HandlesAuthorization;

    /**
     * Permitir todo a admins, excepto habilidades explícitamente excluidas.
     */
    public function before($user, $ability)
    {
        $exceptAbilities = config('consultant-manager.permissions.consultee-except-abilities', []);

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
        return $this->callUserMethod($user, 'indexConsultee');
    }

    public function viewAny(User $user)
    {
        return $this->callUserMethod($user, 'viewAnyConsultee');
    }

    public function view(User $user, Consultee $consultee)
    {
        return $this->callUserMethod($user, 'viewConsultee', $consultee);
    }

    public function create(User $user)
    {
        return $this->callUserMethod($user, 'createConsultee');
    }

    public function update(User $user, Consultee $consultee)
    {
        return $this->callUserMethod($user, 'updateConsultee', $consultee);
    }

    public function delete(User $user, Consultee $consultee)
    {
        return $this->callUserMethod($user, 'deleteConsultee', $consultee);
    }

    public function restore(User $user, Consultee $consultee)
    {
        return $this->callUserMethod($user, 'restoreConsultee', $consultee);
    }

    public function forceDelete(User $user, Consultee $consultee)
    {
        return $this->callUserMethod($user, 'forceDeleteConsultee', $consultee);
    }

    public function export(User $user)
    {
        return $this->callUserMethod($user, 'exportConsultee');
    }
}
