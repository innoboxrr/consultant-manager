<?php

namespace Innoboxrr\ConsultantManager\Models\Filters\ConsultationChat;

use Innoboxrr\SearchSurge\Search\Utils\Managed;

class ManagedFilter extends Managed
{

    public static function canView($query, $user, array $args = [])
    {   

        if(method_exists($user, 'managedConsultationChatFilter')) {
            $query = $user->managedConsultationChatFilter($query, $user, $args);
        }

        return $query;

    }

}