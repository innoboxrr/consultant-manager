<?php

namespace Innoboxrr\ConsultantManager\Models\Filters\ConsultantAvailability;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;
use Innoboxrr\SearchSurge\Search\Utils\UpdatedFilterQuery;
use Innoboxrr\SearchSurge\Search\Support\DataContainer;

class UpdatedFilter
{

    public static function apply(Builder $query, DataContainer $data)
    {

        $query = UpdatedFilterQuery::sort($query, $data);

        $query = Order::orderBy($query, $data, 'updated_at');

        return $query;

    }

}
