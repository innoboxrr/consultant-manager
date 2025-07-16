<?php

namespace Innoboxrr\ConsultantManager\Models\Filters\Consultee;

use Innoboxrr\SearchSurge\Search\Utils\Managed;

class ManagedFilter extends Managed
{

    public static function canView($query, $user, array $args = [])
    {   

        if(method_exists($user, 'managedConsulteeFilter')) {
            $query = $user->managedConsulteeFilter($query, $user, $args);
        }

        return $query;

    }

}