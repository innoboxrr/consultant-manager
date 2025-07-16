<?php

namespace Innoboxrr\ConsultantManager\Models\Filters\Consultant;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;
use Innoboxrr\SearchSurge\Search\Support\DataContainer;

class EagerLoadingFilter
{

    public static function apply(Builder $query, DataContainer $data)
    {
        if ($data->load_user == 1 || $data->load_user == true) {
            $query->with(['user']);
        }

        if ($data->load_consultees == 1 || $data->load_consultees == true) {
            $query->with(['consultees']);
        }

        if ($data->load_team_members == 1 || $data->load_team_members == true) {
            $query->with(['teamMembers']);
        }

        if ($data->load_record_templates == 1 || $data->load_record_templates == true) {
            $query->with(['recordTemplates']);
        }

        if ($data->load_availabilities == 1 || $data->load_availabilities == true) {
            $query->with(['availabilities']);
        }

        if ($data->load_services == 1 || $data->load_services == true) {
            $query->with(['services']);
        }

        /*
        if ($data->load_relation == 1 || $data->load_relation == true) {
            $query->with(['relation']);
        }
        */

        return $query;

    }

}
