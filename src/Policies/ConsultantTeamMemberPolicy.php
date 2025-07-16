<?php

namespace Innoboxrr\ConsultantManager\Policies;

use App\Models\User;
use Innoboxrr\ConsultantManager\Models\ConsultantTeamMember;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConsultantTeamMemberPolicy
{
    use HandlesAuthorization;

    /**
     * Permitir todo a admins, excepto habilidades explícitamente excluidas.
     */
    public function before($user, $ability)
    {
        $exceptAbilities = config('consultant-manager.permissions.consultantteam-member-except-abilities', []);

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
        return $this->callUserMethod($user, 'indexConsultantTeamMember');
    }

    public function viewAny(User $user)
    {
        return $this->callUserMethod($user, 'viewAnyConsultantTeamMember');
    }

    public function view(User $user, ConsultantTeamMember $consultantTeamMember)
    {
        return $this->callUserMethod($user, 'viewConsultantTeamMember', $consultantTeamMember);
    }

    public function create(User $user)
    {
        return $this->callUserMethod($user, 'createConsultantTeamMember');
    }

    public function update(User $user, ConsultantTeamMember $consultantTeamMember)
    {
        return $this->callUserMethod($user, 'updateConsultantTeamMember', $consultantTeamMember);
    }

    public function delete(User $user, ConsultantTeamMember $consultantTeamMember)
    {
        return $this->callUserMethod($user, 'deleteConsultantTeamMember', $consultantTeamMember);
    }

    public function restore(User $user, ConsultantTeamMember $consultantTeamMember)
    {
        return $this->callUserMethod($user, 'restoreConsultantTeamMember', $consultantTeamMember);
    }

    public function forceDelete(User $user, ConsultantTeamMember $consultantTeamMember)
    {
        return $this->callUserMethod($user, 'forceDeleteConsultantTeamMember', $consultantTeamMember);
    }

    public function export(User $user)
    {
        return $this->callUserMethod($user, 'exportConsultantTeamMember');
    }
}
