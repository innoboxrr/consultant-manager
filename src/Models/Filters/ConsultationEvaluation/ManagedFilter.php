<?php

namespace Innoboxrr\ConsultantManager\Models\Filters\ConsultationEvaluation;

use Innoboxrr\SearchSurge\Search\Utils\Managed;

class ManagedFilter extends Managed
{

    public static function canView($query, $user, array $args = [])
    {   

        if(method_exists($user, 'managedConsultationEvaluationFilter')) {
            $query = $user->managedConsultationEvaluationFilter($query, $user, $args);
        }

        return $query;

    }

}