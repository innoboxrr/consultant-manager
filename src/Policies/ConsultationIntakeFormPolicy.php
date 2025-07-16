<?php

namespace Innoboxrr\ConsultantManager\Policies;

use App\Models\User;
use Innoboxrr\ConsultantManager\Models\ConsultationIntakeForm;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConsultationIntakeFormPolicy
{
    use HandlesAuthorization;

    /**
     * Permitir todo a admins, excepto habilidades explícitamente excluidas.
     */
    public function before($user, $ability)
    {
        $exceptAbilities = config('consultant-manager.permissions.consultationintake-form-except-abilities', []);

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
        return $this->callUserMethod($user, 'indexConsultationIntakeForm');
    }

    public function viewAny(User $user)
    {
        return $this->callUserMethod($user, 'viewAnyConsultationIntakeForm');
    }

    public function view(User $user, ConsultationIntakeForm $consultationIntakeForm)
    {
        return $this->callUserMethod($user, 'viewConsultationIntakeForm', $consultationIntakeForm);
    }

    public function create(User $user)
    {
        return $this->callUserMethod($user, 'createConsultationIntakeForm');
    }

    public function update(User $user, ConsultationIntakeForm $consultationIntakeForm)
    {
        return $this->callUserMethod($user, 'updateConsultationIntakeForm', $consultationIntakeForm);
    }

    public function delete(User $user, ConsultationIntakeForm $consultationIntakeForm)
    {
        return $this->callUserMethod($user, 'deleteConsultationIntakeForm', $consultationIntakeForm);
    }

    public function restore(User $user, ConsultationIntakeForm $consultationIntakeForm)
    {
        return $this->callUserMethod($user, 'restoreConsultationIntakeForm', $consultationIntakeForm);
    }

    public function forceDelete(User $user, ConsultationIntakeForm $consultationIntakeForm)
    {
        return $this->callUserMethod($user, 'forceDeleteConsultationIntakeForm', $consultationIntakeForm);
    }

    public function export(User $user)
    {
        return $this->callUserMethod($user, 'exportConsultationIntakeForm');
    }
}
