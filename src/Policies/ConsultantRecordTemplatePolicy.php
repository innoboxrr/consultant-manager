<?php

namespace Innoboxrr\ConsultantManager\Policies;

use App\Models\User;
use Innoboxrr\ConsultantManager\Models\ConsultantRecordTemplate;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConsultantRecordTemplatePolicy
{
    use HandlesAuthorization;

    /**
     * Permitir todo a admins, excepto habilidades explícitamente excluidas.
     */
    public function before($user, $ability)
    {
        $exceptAbilities = config('consultant-manager.permissions.consultantrecordtemplate-except-abilities', []);

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
        return $this->callUserMethod($user, 'indexConsultantRecordTemplate');
    }

    public function viewAny(User $user)
    {
        return $this->callUserMethod($user, 'viewAnyConsultantRecordTemplate');
    }

    public function view(User $user, ConsultantRecordTemplate $consultantRecordTemplate)
    {
        return $this->callUserMethod($user, 'viewConsultantRecordTemplate', $consultantRecordTemplate);
    }

    public function create(User $user)
    {
        return $this->callUserMethod($user, 'createConsultantRecordTemplate');
    }

    public function update(User $user, ConsultantRecordTemplate $consultantRecordTemplate)
    {
        return $this->callUserMethod($user, 'updateConsultantRecordTemplate', $consultantRecordTemplate);
    }

    public function delete(User $user, ConsultantRecordTemplate $consultantRecordTemplate)
    {
        return $this->callUserMethod($user, 'deleteConsultantRecordTemplate', $consultantRecordTemplate);
    }

    public function restore(User $user, ConsultantRecordTemplate $consultantRecordTemplate)
    {
        return $this->callUserMethod($user, 'restoreConsultantRecordTemplate', $consultantRecordTemplate);
    }

    public function forceDelete(User $user, ConsultantRecordTemplate $consultantRecordTemplate)
    {
        return $this->callUserMethod($user, 'forceDeleteConsultantRecordTemplate', $consultantRecordTemplate);
    }

    public function export(User $user)
    {
        return $this->callUserMethod($user, 'exportConsultantRecordTemplate');
    }
}
