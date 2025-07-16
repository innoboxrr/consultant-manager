<?php

namespace Innoboxrr\ConsultantManager\Models\Filters\ConsultationPrice;

use Innoboxrr\SearchSurge\Search\Utils\Managed;

class ManagedFilter extends Managed
{

    public static function canView($query, $user, array $args = [])
    {   

        if(method_exists($user, 'managedConsultationPriceFilter')) {
            $query = $user->managedConsultationPriceFilter($query, $user, $args);
        }

        return $query;

    }

}