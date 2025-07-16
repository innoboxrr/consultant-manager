<?php

namespace Innoboxrr\ConsultantManager\Policies;

use App\Models\User;
use Innoboxrr\ConsultantManager\Models\ConsulteeRecordCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConsulteeRecordCategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Permitir todo a admins, excepto habilidades explícitamente excluidas.
     */
    public function before($user, $ability)
    {
        $exceptAbilities = config('consultant-manager.permissions.consulteerecordcategory-except-abilities', []);

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
        return $this->callUserMethod($user, 'indexConsulteeRecordCategory');
    }

    public function viewAny(User $user)
    {
        return $this->callUserMethod($user, 'viewAnyConsulteeRecordCategory');
    }

    public function view(User $user, ConsulteeRecordCategory $consulteeRecordCategory)
    {
        return $this->callUserMethod($user, 'viewConsulteeRecordCategory', $consulteeRecordCategory);
    }

    public function create(User $user)
    {
        return $this->callUserMethod($user, 'createConsulteeRecordCategory');
    }

    public function update(User $user, ConsulteeRecordCategory $consulteeRecordCategory)
    {
        return $this->callUserMethod($user, 'updateConsulteeRecordCategory', $consulteeRecordCategory);
    }

    public function delete(User $user, ConsulteeRecordCategory $consulteeRecordCategory)
    {
        return $this->callUserMethod($user, 'deleteConsulteeRecordCategory', $consulteeRecordCategory);
    }

    public function restore(User $user, ConsulteeRecordCategory $consulteeRecordCategory)
    {
        return $this->callUserMethod($user, 'restoreConsulteeRecordCategory', $consulteeRecordCategory);
    }

    public function forceDelete(User $user, ConsulteeRecordCategory $consulteeRecordCategory)
    {
        return $this->callUserMethod($user, 'forceDeleteConsulteeRecordCategory', $consulteeRecordCategory);
    }

    public function export(User $user)
    {
        return $this->callUserMethod($user, 'exportConsulteeRecordCategory');
    }
}
