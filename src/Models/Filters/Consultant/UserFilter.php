<?php

namespace Innoboxrr\ConsultantManager\Models\Filters\Consultant;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;
use Innoboxrr\SearchSurge\Search\Support\DataContainer;

class UserFilter
{

    public static function apply(Builder $query, DataContainer $data)
    {

        if ($data->user_id) {

            $query->where('user_id', $data->user_id);

        }

        $query = Order::orderBy($query, $data, 'user_id');

        return $query;

    }

}
