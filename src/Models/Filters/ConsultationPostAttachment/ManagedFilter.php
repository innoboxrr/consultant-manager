<?php

namespace Innoboxrr\ConsultantManager\Models\Filters\ConsultationPostAttachment;

use Innoboxrr\SearchSurge\Search\Utils\Managed;

class ManagedFilter extends Managed
{

    public static function canView($query, $user, array $args = [])
    {   

        if(method_exists($user, 'managedConsultationPostAttachmentFilter')) {
            $query = $user->managedConsultationPostAttachmentFilter($query, $user, $args);
        }

        return $query;

    }

}