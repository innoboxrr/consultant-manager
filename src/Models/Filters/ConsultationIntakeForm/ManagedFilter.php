<?php

namespace Innoboxrr\ConsultantManager\Models\Filters\ConsultationIntakeForm;

use Innoboxrr\SearchSurge\Search\Utils\Managed;

class ManagedFilter extends Managed
{

    public static function canView($query, $user, array $args = [])
    {   

        if(method_exists($user, 'managedConsultationIntakeFormFilter')) {
            $query = $user->managedConsultationIntakeFormFilter($query, $user, $args);
        }

        return $query;

    }

}