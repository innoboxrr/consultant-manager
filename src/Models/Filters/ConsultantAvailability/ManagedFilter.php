<?php

namespace Innoboxrr\ConsultantManager\Models\Filters\ConsultantAvailability;

use Innoboxrr\SearchSurge\Search\Utils\Managed;

class ManagedFilter extends Managed
{

    public static function canView($query, $user, array $args = [])
    {   

        if(method_exists($user, 'managedConsultantAvailabilityFilter')) {
            $query = $user->managedConsultantAvailabilityFilter($query, $user, $args);
        }

        return $query;

    }

}