<?php

namespace Innoboxrr\ConsultantManager\Policies;

use App\Models\User;
use Innoboxrr\ConsultantManager\Models\ConsultationEvaluation;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConsultationEvaluationPolicy
{
    use HandlesAuthorization;

    /**
     * Permitir todo a admins, excepto habilidades explícitamente excluidas.
     */
    public function before($user, $ability)
    {
        $exceptAbilities = config('consultant-manager.permissions.consultationevaluation-except-abilities', []);

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
        return $this->callUserMethod($user, 'indexConsultationEvaluation');
    }

    public function viewAny(User $user)
    {
        return $this->callUserMethod($user, 'viewAnyConsultationEvaluation');
    }

    public function view(User $user, ConsultationEvaluation $consultationEvaluation)
    {
        return $this->callUserMethod($user, 'viewConsultationEvaluation', $consultationEvaluation);
    }

    public function create(User $user)
    {
        return $this->callUserMethod($user, 'createConsultationEvaluation');
    }

    public function update(User $user, ConsultationEvaluation $consultationEvaluation)
    {
        return $this->callUserMethod($user, 'updateConsultationEvaluation', $consultationEvaluation);
    }

    public function delete(User $user, ConsultationEvaluation $consultationEvaluation)
    {
        return $this->callUserMethod($user, 'deleteConsultationEvaluation', $consultationEvaluation);
    }

    public function restore(User $user, ConsultationEvaluation $consultationEvaluation)
    {
        return $this->callUserMethod($user, 'restoreConsultationEvaluation', $consultationEvaluation);
    }

    public function forceDelete(User $user, ConsultationEvaluation $consultationEvaluation)
    {
        return $this->callUserMethod($user, 'forceDeleteConsultationEvaluation', $consultationEvaluation);
    }

    public function export(User $user)
    {
        return $this->callUserMethod($user, 'exportConsultationEvaluation');
    }
}
