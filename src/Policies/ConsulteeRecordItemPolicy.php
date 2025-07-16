<?php

namespace Innoboxrr\ConsultantManager\Policies;

use App\Models\User;
use Innoboxrr\ConsultantManager\Models\ConsulteeRecordItem;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConsulteeRecordItemPolicy
{
    use HandlesAuthorization;

    /**
     * Permitir todo a admins, excepto habilidades explícitamente excluidas.
     */
    public function before($user, $ability)
    {
        $exceptAbilities = config('consultant-manager.permissions.consulteerecorditem-except-abilities', []);

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
        return $this->callUserMethod($user, 'indexConsulteeRecordItem');
    }

    public function viewAny(User $user)
    {
        return $this->callUserMethod($user, 'viewAnyConsulteeRecordItem');
    }

    public function view(User $user, ConsulteeRecordItem $consulteeRecordItem)
    {
        return $this->callUserMethod($user, 'viewConsulteeRecordItem', $consulteeRecordItem);
    }

    public function create(User $user)
    {
        return $this->callUserMethod($user, 'createConsulteeRecordItem');
    }

    public function update(User $user, ConsulteeRecordItem $consulteeRecordItem)
    {
        return $this->callUserMethod($user, 'updateConsulteeRecordItem', $consulteeRecordItem);
    }

    public function delete(User $user, ConsulteeRecordItem $consulteeRecordItem)
    {
        return $this->callUserMethod($user, 'deleteConsulteeRecordItem', $consulteeRecordItem);
    }

    public function restore(User $user, ConsulteeRecordItem $consulteeRecordItem)
    {
        return $this->callUserMethod($user, 'restoreConsulteeRecordItem', $consulteeRecordItem);
    }

    public function forceDelete(User $user, ConsulteeRecordItem $consulteeRecordItem)
    {
        return $this->callUserMethod($user, 'forceDeleteConsulteeRecordItem', $consulteeRecordItem);
    }

    public function export(User $user)
    {
        return $this->callUserMethod($user, 'exportConsulteeRecordItem');
    }
}
