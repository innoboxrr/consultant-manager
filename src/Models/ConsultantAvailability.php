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
        //FILLABLE//
    ];

    protected $creatable = [
        //CREATABLE//
    ];

    protected $updatable = [
        //UPDATABLE//
    ];

    protected $casts = [
        //CASTS//
    ];

    protected $protected_metas = [];

    protected $editable_metas = [
        //EDITABLEMETAS//
    ];

    public static $export_cols = [
        //EXPORTCOLS//
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
