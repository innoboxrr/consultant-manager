<?php

namespace Innoboxrr\ConsultantManager\Models\Filters\ConsultationPost;

use Innoboxrr\SearchSurge\Search\Utils\Managed;

class ManagedFilter extends Managed
{

    public static function canView($query, $user, array $args = [])
    {   

        if(method_exists($user, 'managedConsultationPostFilter')) {
            $query = $user->managedConsultationPostFilter($query, $user, $args);
        }

        return $query;

    }

}