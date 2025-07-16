<?php

namespace Innoboxrr\ConsultantManager\Policies;

use App\Models\User;
use Innoboxrr\ConsultantManager\Models\ConsultationPayment;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConsultationPaymentPolicy
{
    use HandlesAuthorization;

    /**
     * Permitir todo a admins, excepto habilidades explícitamente excluidas.
     */
    public function before($user, $ability)
    {
        $exceptAbilities = config('consultant-manager.permissions.consultationpayment-except-abilities', []);

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
        return $this->callUserMethod($user, 'indexConsultationPayment');
    }

    public function viewAny(User $user)
    {
        return $this->callUserMethod($user, 'viewAnyConsultationPayment');
    }

    public function view(User $user, ConsultationPayment $consultationPayment)
    {
        return $this->callUserMethod($user, 'viewConsultationPayment', $consultationPayment);
    }

    public function create(User $user)
    {
        return $this->callUserMethod($user, 'createConsultationPayment');
    }

    public function update(User $user, ConsultationPayment $consultationPayment)
    {
        return $this->callUserMethod($user, 'updateConsultationPayment', $consultationPayment);
    }

    public function delete(User $user, ConsultationPayment $consultationPayment)
    {
        return $this->callUserMethod($user, 'deleteConsultationPayment', $consultationPayment);
    }

    public function restore(User $user, ConsultationPayment $consultationPayment)
    {
        return $this->callUserMethod($user, 'restoreConsultationPayment', $consultationPayment);
    }

    public function forceDelete(User $user, ConsultationPayment $consultationPayment)
    {
        return $this->callUserMethod($user, 'forceDeleteConsultationPayment', $consultationPayment);
    }

    public function export(User $user)
    {
        return $this->callUserMethod($user, 'exportConsultationPayment');
    }
}
