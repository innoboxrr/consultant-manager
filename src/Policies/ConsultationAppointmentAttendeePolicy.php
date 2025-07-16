<?php

namespace Innoboxrr\ConsultantManager\Policies;

use App\Models\User;
use Innoboxrr\ConsultantManager\Models\ConsultationAppointmentAttendee;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConsultationAppointmentAttendeePolicy
{
    use HandlesAuthorization;

    /**
     * Permitir todo a admins, excepto habilidades explícitamente excluidas.
     */
    public function before($user, $ability)
    {
        $exceptAbilities = config('consultant-manager.permissions.consultationappointmentattendee-except-abilities', []);

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
        return $this->callUserMethod($user, 'indexConsultationAppointmentAttendee');
    }

    public function viewAny(User $user)
    {
        return $this->callUserMethod($user, 'viewAnyConsultationAppointmentAttendee');
    }

    public function view(User $user, ConsultationAppointmentAttendee $consultationAppointmentAttendee)
    {
        return $this->callUserMethod($user, 'viewConsultationAppointmentAttendee', $consultationAppointmentAttendee);
    }

    public function create(User $user)
    {
        return $this->callUserMethod($user, 'createConsultationAppointmentAttendee');
    }

    public function update(User $user, ConsultationAppointmentAttendee $consultationAppointmentAttendee)
    {
        return $this->callUserMethod($user, 'updateConsultationAppointmentAttendee', $consultationAppointmentAttendee);
    }

    public function delete(User $user, ConsultationAppointmentAttendee $consultationAppointmentAttendee)
    {
        return $this->callUserMethod($user, 'deleteConsultationAppointmentAttendee', $consultationAppointmentAttendee);
    }

    public function restore(User $user, ConsultationAppointmentAttendee $consultationAppointmentAttendee)
    {
        return $this->callUserMethod($user, 'restoreConsultationAppointmentAttendee', $consultationAppointmentAttendee);
    }

    public function forceDelete(User $user, ConsultationAppointmentAttendee $consultationAppointmentAttendee)
    {
        return $this->callUserMethod($user, 'forceDeleteConsultationAppointmentAttendee', $consultationAppointmentAttendee);
    }

    public function export(User $user)
    {
        return $this->callUserMethod($user, 'exportConsultationAppointmentAttendee');
    }
}
