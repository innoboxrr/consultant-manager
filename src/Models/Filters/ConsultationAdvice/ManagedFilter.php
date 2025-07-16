<?php

namespace Innoboxrr\ConsultantManager\Models\Filters\ConsultationAdvice;

use Innoboxrr\SearchSurge\Search\Utils\Managed;

class ManagedFilter extends Managed
{

    public static function canView($query, $user, array $args = [])
    {   

        if(method_exists($user, 'managedConsultationAdviceFilter')) {
            $query = $user->managedConsultationAdviceFilter($query, $user, $args);
        }

        return $query;

    }

}