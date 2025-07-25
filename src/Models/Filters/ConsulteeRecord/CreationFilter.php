<?php

namespace Innoboxrr\ConsultantManager\Models\Filters\ConsulteeRecord;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;
use Innoboxrr\SearchSurge\Search\Utils\CreationFilterQuery;
use Innoboxrr\SearchSurge\Search\Support\DataContainer;

class CreationFilter
{

    public static function apply(Builder $query, DataContainer $data)
    {

        $query = CreationFilterQuery::sort($query, $data);

        $query = Order::orderBy($query, $data, 'created_at');

        return $query;

    }

}
