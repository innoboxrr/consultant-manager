<?php

namespace Innoboxrr\ConsultantManager\Policies;

use App\Models\User;
use Innoboxrr\ConsultantManager\Models\ConsulteeRecordResponse;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConsulteeRecordResponsePolicy
{
    use HandlesAuthorization;

    /**
     * Permitir todo a admins, excepto habilidades explícitamente excluidas.
     */
    public function before($user, $ability)
    {
        $exceptAbilities = config('consultant-manager.permissions.consulteerecordresponse-except-abilities', []);

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
        return $this->callUserMethod($user, 'indexConsulteeRecordResponse');
    }

    public function viewAny(User $user)
    {
        return $this->callUserMethod($user, 'viewAnyConsulteeRecordResponse');
    }

    public function view(User $user, ConsulteeRecordResponse $consulteeRecordResponse)
    {
        return $this->callUserMethod($user, 'viewConsulteeRecordResponse', $consulteeRecordResponse);
    }

    public function create(User $user)
    {
        return $this->callUserMethod($user, 'createConsulteeRecordResponse');
    }

    public function update(User $user, ConsulteeRecordResponse $consulteeRecordResponse)
    {
        return $this->callUserMethod($user, 'updateConsulteeRecordResponse', $consulteeRecordResponse);
    }

    public function delete(User $user, ConsulteeRecordResponse $consulteeRecordResponse)
    {
        return $this->callUserMethod($user, 'deleteConsulteeRecordResponse', $consulteeRecordResponse);
    }

    public function restore(User $user, ConsulteeRecordResponse $consulteeRecordResponse)
    {
        return $this->callUserMethod($user, 'restoreConsulteeRecordResponse', $consulteeRecordResponse);
    }

    public function forceDelete(User $user, ConsulteeRecordResponse $consulteeRecordResponse)
    {
        return $this->callUserMethod($user, 'forceDeleteConsulteeRecordResponse', $consulteeRecordResponse);
    }

    public function export(User $user)
    {
        return $this->callUserMethod($user, 'exportConsulteeRecordResponse');
    }
}
