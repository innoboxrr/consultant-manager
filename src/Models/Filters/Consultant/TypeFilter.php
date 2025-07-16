<?php

namespace Innoboxrr\ConsultantManager\Models\Filters\Consultant;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;
use Innoboxrr\SearchSurge\Search\Support\DataContainer;

class TypeFilter
{

    public static function apply(Builder $query, DataContainer $data)
    {

        if ($data->type) {

            $query->where('type', $data->type);

        }

        $query = Order::orderBy($query, $data, 'type');

        return $query;

    }

}
