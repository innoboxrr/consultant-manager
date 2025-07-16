<?php

namespace Innoboxrr\ConsultantManager\Models\Filters\Consultant;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;
use Innoboxrr\SearchSurge\Search\Support\DataContainer;

class VerificationFilter
{

    public static function apply(Builder $query, DataContainer $data)
    {

        if ($data->verified) {

            $query->where('verified_at', '!=', null);

        }

        $query = Order::orderBy($query, $data, 'verified_at');

        return $query;

    }

}
