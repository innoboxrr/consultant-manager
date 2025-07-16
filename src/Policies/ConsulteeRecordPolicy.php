<?php

namespace Innoboxrr\ConsultantManager\Policies;

use App\Models\User;
use Innoboxrr\ConsultantManager\Models\ConsulteeRecord;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConsulteeRecordPolicy
{
    use HandlesAuthorization;

    /**
     * Permitir todo a admins, excepto habilidades explícitamente excluidas.
     */
    public function before($user, $ability)
    {
        $exceptAbilities = config('consultant-manager.permissions.consulteerecord-except-abilities', []);

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
        return $this->callUserMethod($user, 'indexConsulteeRecord');
    }

    public function viewAny(User $user)
    {
        return $this->callUserMethod($user, 'viewAnyConsulteeRecord');
    }

    public function view(User $user, ConsulteeRecord $consulteeRecord)
    {
        return $this->callUserMethod($user, 'viewConsulteeRecord', $consulteeRecord);
    }

    public function create(User $user)
    {
        return $this->callUserMethod($user, 'createConsulteeRecord');
    }

    public function update(User $user, ConsulteeRecord $consulteeRecord)
    {
        return $this->callUserMethod($user, 'updateConsulteeRecord', $consulteeRecord);
    }

    public function delete(User $user, ConsulteeRecord $consulteeRecord)
    {
        return $this->callUserMethod($user, 'deleteConsulteeRecord', $consulteeRecord);
    }

    public function restore(User $user, ConsulteeRecord $consulteeRecord)
    {
        return $this->callUserMethod($user, 'restoreConsulteeRecord', $consulteeRecord);
    }

    public function forceDelete(User $user, ConsulteeRecord $consulteeRecord)
    {
        return $this->callUserMethod($user, 'forceDeleteConsulteeRecord', $consulteeRecord);
    }

    public function export(User $user)
    {
        return $this->callUserMethod($user, 'exportConsulteeRecord');
    }
}
