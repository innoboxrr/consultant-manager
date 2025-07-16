<?php

namespace Innoboxrr\ConsultantManager\Policies;

use App\Models\User;
use Innoboxrr\ConsultantManager\Models\ConsultationPostAttachment;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConsultationPostAttachmentPolicy
{
    use HandlesAuthorization;

    /**
     * Permitir todo a admins, excepto habilidades explícitamente excluidas.
     */
    public function before($user, $ability)
    {
        $exceptAbilities = config('consultant-manager.permissions.consultationpostattachment-except-abilities', []);

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
        return $this->callUserMethod($user, 'indexConsultationPostAttachment');
    }

    public function viewAny(User $user)
    {
        return $this->callUserMethod($user, 'viewAnyConsultationPostAttachment');
    }

    public function view(User $user, ConsultationPostAttachment $consultationPostAttachment)
    {
        return $this->callUserMethod($user, 'viewConsultationPostAttachment', $consultationPostAttachment);
    }

    public function create(User $user)
    {
        return $this->callUserMethod($user, 'createConsultationPostAttachment');
    }

    public function update(User $user, ConsultationPostAttachment $consultationPostAttachment)
    {
        return $this->callUserMethod($user, 'updateConsultationPostAttachment', $consultationPostAttachment);
    }

    public function delete(User $user, ConsultationPostAttachment $consultationPostAttachment)
    {
        return $this->callUserMethod($user, 'deleteConsultationPostAttachment', $consultationPostAttachment);
    }

    public function restore(User $user, ConsultationPostAttachment $consultationPostAttachment)
    {
        return $this->callUserMethod($user, 'restoreConsultationPostAttachment', $consultationPostAttachment);
    }

    public function forceDelete(User $user, ConsultationPostAttachment $consultationPostAttachment)
    {
        return $this->callUserMethod($user, 'forceDeleteConsultationPostAttachment', $consultationPostAttachment);
    }

    public function export(User $user)
    {
        return $this->callUserMethod($user, 'exportConsultationPostAttachment');
    }
}
