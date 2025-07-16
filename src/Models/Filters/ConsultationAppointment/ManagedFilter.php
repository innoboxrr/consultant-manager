<?php

namespace Innoboxrr\ConsultantManager\Models\Filters\ConsultationAppointment;

use Innoboxrr\SearchSurge\Search\Utils\Managed;

class ManagedFilter extends Managed
{

    public static function canView($query, $user, array $args = [])
    {   

        if(method_exists($user, 'managedConsultationAppointmentFilter')) {
            $query = $user->managedConsultationAppointmentFilter($query, $user, $args);
        }

        return $query;

    }

}