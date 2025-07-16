<?php

namespace Innoboxrr\ConsultantManager\Policies;

use App\Models\User;
use Innoboxrr\ConsultantManager\Models\Consultant;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConsultantPolicy
{
    use HandlesAuthorization;

    /**
     * Permitir todo a admins, excepto habilidades explícitamente excluidas.
     */
    public function before($user, $ability)
    {
        $exceptAbilities = config('consultant-manager.permissions.consultant-except-abilities', []);

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
        return $this->callUserMethod($user, 'indexConsultant');
    }

    public function viewAny(User $user)
    {
        return $this->callUserMethod($user, 'viewAnyConsultant');
    }

    public function view(User $user, Consultant $consultant)
    {
        return $this->callUserMethod($user, 'viewConsultant', $consultant);
    }

    public function create(User $user)
    {
        return $this->callUserMethod($user, 'createConsultant');
    }

    public function update(User $user, Consultant $consultant)
    {
        return $this->callUserMethod($user, 'updateConsultant', $consultant);
    }

    public function delete(User $user, Consultant $consultant)
    {
        return $this->callUserMethod($user, 'deleteConsultant', $consultant);
    }

    public function restore(User $user, Consultant $consultant)
    {
        return $this->callUserMethod($user, 'restoreConsultant', $consultant);
    }

    public function forceDelete(User $user, Consultant $consultant)
    {
        return $this->callUserMethod($user, 'forceDeleteConsultant', $consultant);
    }

    public function export(User $user)
    {
        return $this->callUserMethod($user, 'exportConsultant');
    }
}
