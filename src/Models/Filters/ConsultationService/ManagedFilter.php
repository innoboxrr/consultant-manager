<?php

namespace Innoboxrr\ConsultantManager\Models\Filters\ConsultationService;

use Innoboxrr\SearchSurge\Search\Utils\Managed;

class ManagedFilter extends Managed
{

    public static function canView($query, $user, array $args = [])
    {   

        if(method_exists($user, 'managedConsultationServiceFilter')) {
            $query = $user->managedConsultationServiceFilter($query, $user, $args);
        }

        return $query;

    }

}