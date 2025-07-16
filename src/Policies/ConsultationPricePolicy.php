<?php

namespace Innoboxrr\ConsultantManager\Policies;

use App\Models\User;
use Innoboxrr\ConsultantManager\Models\ConsultationPrice;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConsultationPricePolicy
{
    use HandlesAuthorization;

    /**
     * Permitir todo a admins, excepto habilidades explícitamente excluidas.
     */
    public function before($user, $ability)
    {
        $exceptAbilities = config('consultant-manager.permissions.consultationprice-except-abilities', []);

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
        return $this->callUserMethod($user, 'indexConsultationPrice');
    }

    public function viewAny(User $user)
    {
        return $this->callUserMethod($user, 'viewAnyConsultationPrice');
    }

    public function view(User $user, ConsultationPrice $consultationPrice)
    {
        return $this->callUserMethod($user, 'viewConsultationPrice', $consultationPrice);
    }

    public function create(User $user)
    {
        return $this->callUserMethod($user, 'createConsultationPrice');
    }

    public function update(User $user, ConsultationPrice $consultationPrice)
    {
        return $this->callUserMethod($user, 'updateConsultationPrice', $consultationPrice);
    }

    public function delete(User $user, ConsultationPrice $consultationPrice)
    {
        return $this->callUserMethod($user, 'deleteConsultationPrice', $consultationPrice);
    }

    public function restore(User $user, ConsultationPrice $consultationPrice)
    {
        return $this->callUserMethod($user, 'restoreConsultationPrice', $consultationPrice);
    }

    public function forceDelete(User $user, ConsultationPrice $consultationPrice)
    {
        return $this->callUserMethod($user, 'forceDeleteConsultationPrice', $consultationPrice);
    }

    public function export(User $user)
    {
        return $this->callUserMethod($user, 'exportConsultationPrice');
    }
}
