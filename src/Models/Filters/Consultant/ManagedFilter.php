<?php

namespace Innoboxrr\ConsultantManager\Models\Filters\Consultant;

use Innoboxrr\SearchSurge\Search\Utils\Managed;

class ManagedFilter extends Managed
{

    public static function canView($query, $user, array $args = [])
    {   

        if(method_exists($user, 'managedConsultantFilter')) {
            $query = $user->managedConsultantFilter($query, $user, $args);
        }

        return $query;

    }

}