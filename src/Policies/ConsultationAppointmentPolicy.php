<?php

namespace Innoboxrr\ConsultantManager\Policies;

use App\Models\User;
use Innoboxrr\ConsultantManager\Models\ConsultationAppointment;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConsultationAppointmentPolicy
{
    use HandlesAuthorization;

    /**
     * Permitir todo a admins, excepto habilidades explícitamente excluidas.
     */
    public function before($user, $ability)
    {
        $exceptAbilities = config('consultant-manager.permissions.consultationappointment-except-abilities', []);

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
        return $this->callUserMethod($user, 'indexConsultationAppointment');
    }

    public function viewAny(User $user)
    {
        return $this->callUserMethod($user, 'viewAnyConsultationAppointment');
    }

    public function view(User $user, ConsultationAppointment $consultationAppointment)
    {
        return $this->callUserMethod($user, 'viewConsultationAppointment', $consultationAppointment);
    }

    public function create(User $user)
    {
        return $this->callUserMethod($user, 'createConsultationAppointment');
    }

    public function update(User $user, ConsultationAppointment $consultationAppointment)
    {
        return $this->callUserMethod($user, 'updateConsultationAppointment', $consultationAppointment);
    }

    public function delete(User $user, ConsultationAppointment $consultationAppointment)
    {
        return $this->callUserMethod($user, 'deleteConsultationAppointment', $consultationAppointment);
    }

    public function restore(User $user, ConsultationAppointment $consultationAppointment)
    {
        return $this->callUserMethod($user, 'restoreConsultationAppointment', $consultationAppointment);
    }

    public function forceDelete(User $user, ConsultationAppointment $consultationAppointment)
    {
        return $this->callUserMethod($user, 'forceDeleteConsultationAppointment', $consultationAppointment);
    }

    public function export(User $user)
    {
        return $this->callUserMethod($user, 'exportConsultationAppointment');
    }
}
