<?php

namespace Innoboxrr\ConsultantManager\Models\Filters\ConsulteeRecordCategory;

use Innoboxrr\SearchSurge\Search\Utils\Managed;

class ManagedFilter extends Managed
{

    public static function canView($query, $user, array $args = [])
    {   

        if(method_exists($user, 'managedConsulteeRecordCategoryFilter')) {
            $query = $user->managedConsulteeRecordCategoryFilter($query, $user, $args);
        }

        return $query;

    }

}