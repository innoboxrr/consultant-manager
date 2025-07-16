<?php

namespace Innoboxrr\ConsultantManager\Models\Filters\ConsulteeRecordResponse;

use Innoboxrr\SearchSurge\Search\Utils\Managed;

class ManagedFilter extends Managed
{

    public static function canView($query, $user, array $args = [])
    {   

        if(method_exists($user, 'managedConsulteeRecordResponseFilter')) {
            $query = $user->managedConsulteeRecordResponseFilter($query, $user, $args);
        }

        return $query;

    }

}