<?php

namespace Innoboxrr\ConsultantManager\Models\Filters\ConsultantRecordTemplate;

use Innoboxrr\SearchSurge\Search\Utils\Managed;

class ManagedFilter extends Managed
{

    public static function canView($query, $user, array $args = [])
    {   

        if(method_exists($user, 'managedConsultantRecordTemplateFilter')) {
            $query = $user->managedConsultantRecordTemplateFilter($query, $user, $args);
        }

        return $query;

    }

}