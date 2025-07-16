<?php

namespace Innoboxrr\ConsultantManager\Models\Filters\ConsulteeRecordItem;

use Innoboxrr\SearchSurge\Search\Utils\Managed;

class ManagedFilter extends Managed
{

    public static function canView($query, $user, array $args = [])
    {   

        if(method_exists($user, 'managedConsulteeRecordItemFilter')) {
            $query = $user->managedConsulteeRecordItemFilter($query, $user, $args);
        }

        return $query;

    }

}