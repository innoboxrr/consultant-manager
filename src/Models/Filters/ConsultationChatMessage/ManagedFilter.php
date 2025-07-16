<?php

namespace Innoboxrr\ConsultantManager\Models\Filters\ConsultationChatMessage;

use Innoboxrr\SearchSurge\Search\Utils\Managed;

class ManagedFilter extends Managed
{

    public static function canView($query, $user, array $args = [])
    {   

        if(method_exists($user, 'managedConsultationChatMessageFilter')) {
            $query = $user->managedConsultationChatMessageFilter($query, $user, $args);
        }

        return $query;

    }

}