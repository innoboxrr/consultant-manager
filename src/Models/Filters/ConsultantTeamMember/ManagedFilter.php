<?php

namespace Innoboxrr\ConsultantManager\Models\Filters\ConsultantTeamMember;

use Innoboxrr\SearchSurge\Search\Utils\Managed;

class ManagedFilter extends Managed
{

    public static function canView($query, $user, array $args = [])
    {   

        if(method_exists($user, 'managedConsultantTeamMemberFilter')) {
            $query = $user->managedConsultantTeamMemberFilter($query, $user, $args);
        }

        return $query;

    }

}