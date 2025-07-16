<?php

namespace Innoboxrr\ConsultantManager\Policies;

use App\Models\User;
use Innoboxrr\ConsultantManager\Models\ConsultationPost;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConsultationPostPolicy
{
    use HandlesAuthorization;

    /**
     * Permitir todo a admins, excepto habilidades explícitamente excluidas.
     */
    public function before($user, $ability)
    {
        $exceptAbilities = config('consultant-manager.permissions.consultationpost-except-abilities', []);

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
        return $this->callUserMethod($user, 'indexConsultationPost');
    }

    public function viewAny(User $user)
    {
        return $this->callUserMethod($user, 'viewAnyConsultationPost');
    }

    public function view(User $user, ConsultationPost $consultationPost)
    {
        return $this->callUserMethod($user, 'viewConsultationPost', $consultationPost);
    }

    public function create(User $user)
    {
        return $this->callUserMethod($user, 'createConsultationPost');
    }

    public function update(User $user, ConsultationPost $consultationPost)
    {
        return $this->callUserMethod($user, 'updateConsultationPost', $consultationPost);
    }

    public function delete(User $user, ConsultationPost $consultationPost)
    {
        return $this->callUserMethod($user, 'deleteConsultationPost', $consultationPost);
    }

    public function restore(User $user, ConsultationPost $consultationPost)
    {
        return $this->callUserMethod($user, 'restoreConsultationPost', $consultationPost);
    }

    public function forceDelete(User $user, ConsultationPost $consultationPost)
    {
        return $this->callUserMethod($user, 'forceDeleteConsultationPost', $consultationPost);
    }

    public function export(User $user)
    {
        return $this->callUserMethod($user, 'exportConsultationPost');
    }
}
