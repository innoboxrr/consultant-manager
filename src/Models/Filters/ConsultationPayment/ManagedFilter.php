<?php

namespace Innoboxrr\ConsultantManager\Models\Filters\ConsultationPayment;

use Innoboxrr\SearchSurge\Search\Utils\Managed;

class ManagedFilter extends Managed
{

    public static function canView($query, $user, array $args = [])
    {   

        if(method_exists($user, 'managedConsultationPaymentFilter')) {
            $query = $user->managedConsultationPaymentFilter($query, $user, $args);
        }

        return $query;

    }

}