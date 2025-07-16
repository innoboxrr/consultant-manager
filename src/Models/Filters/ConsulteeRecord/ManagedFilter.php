<?php

namespace Innoboxrr\ConsultantManager\Models\Filters\ConsulteeRecord;

use Innoboxrr\SearchSurge\Search\Utils\Managed;

class ManagedFilter extends Managed
{

    public static function canView($query, $user, array $args = [])
    {   

        if(method_exists($user, 'managedConsulteeRecordFilter')) {
            $query = $user->managedConsulteeRecordFilter($query, $user, $args);
        }

        return $query;

    }

}