<?php

namespace Innoboxrr\ConsultantManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use Innoboxrr\Traits\ModelAppendsTrait;
use Innoboxrr\ConsultantManager\Models\Traits\Relations\ConsultantAvailabilityRelations;
use Innoboxrr\ConsultantManager\Models\Traits\Storage\ConsultantAvailabilityStorage;
use Innoboxrr\ConsultantManager\Models\Traits\Assignments\ConsultantAvailabilityAssignment;
use Innoboxrr\ConsultantManager\Models\Traits\Operations\ConsultantAvailabilityOperations;
use Innoboxrr\ConsultantManager\Models\Traits\Mutators\ConsultantAvailabilityMutators;

class ConsultantAvailability extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        ModelAppendsTrait,
        ConsultantAvailabilityRelations,
        ConsultantAvailabilityStorage,
        ConsultantAvailabilityAssignment,
        ConsultantAvailabilityOperations,
        ConsultantAvailabilityMutators;
        
    protected $fillable = [
        'day_of_week',
        'start_time',
        'end_time',
        'max_sessions',
        'consultant_id',
    ];

    protected $creatable = [
        'day_of_week',
        'start_time',
        'end_time',
        'max_sessions',
        'consultant_id',
    ];

    protected $updatable = [
        'day_of_week',
        'start_time',
        'end_time',
        'max_sessions',
    ];

    protected $casts = [
        'start_time' => 'datetime:H:i',
        'end_time' => 'datetime:H:i',
        'max_sessions' => 'integer',
    ];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public static $export_cols = [
        'id',
        'day_of_week',
        'start_time',
        'end_time',
        'max_sessions',
        'consultant_id',
        'created_at',
        'updated_at',
    ];

    public static $loadable_relations = [
        //LOADABLERELATIONS//
    ];

    public static $loadable_counts = [
        //LOADABLECOUNTS//
    ];

    /*
    protected static function newFactory()
    {
        return \Innoboxrr\ConsultantManager\Database\Factories\ConsultantAvailabilityFactory::new();
    }
    */

}
