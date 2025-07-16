<?php

namespace Innoboxrr\ConsultantManager\Policies;

use App\Models\User;
use Innoboxrr\ConsultantManager\Models\ConsultationAdvice;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConsultationAdvicePolicy
{
    use HandlesAuthorization;

    /**
     * Permitir todo a admins, excepto habilidades explícitamente excluidas.
     */
    public function before($user, $ability)
    {
        $exceptAbilities = config('consultant-manager.permissions.consultationadvice-except-abilities', []);

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
        return $this->callUserMethod($user, 'indexConsultationAdvice');
    }

    public function viewAny(User $user)
    {
        return $this->callUserMethod($user, 'viewAnyConsultationAdvice');
    }

    public function view(User $user, ConsultationAdvice $consultationAdvice)
    {
        return $this->callUserMethod($user, 'viewConsultationAdvice', $consultationAdvice);
    }

    public function create(User $user)
    {
        return $this->callUserMethod($user, 'createConsultationAdvice');
    }

    public function update(User $user, ConsultationAdvice $consultationAdvice)
    {
        return $this->callUserMethod($user, 'updateConsultationAdvice', $consultationAdvice);
    }

    public function delete(User $user, ConsultationAdvice $consultationAdvice)
    {
        return $this->callUserMethod($user, 'deleteConsultationAdvice', $consultationAdvice);
    }

    public function restore(User $user, ConsultationAdvice $consultationAdvice)
    {
        return $this->callUserMethod($user, 'restoreConsultationAdvice', $consultationAdvice);
    }

    public function forceDelete(User $user, ConsultationAdvice $consultationAdvice)
    {
        return $this->callUserMethod($user, 'forceDeleteConsultationAdvice', $consultationAdvice);
    }

    public function export(User $user)
    {
        return $this->callUserMethod($user, 'exportConsultationAdvice');
    }
}
