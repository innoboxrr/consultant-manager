<?php

namespace Innoboxrr\ConsultantManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use Innoboxrr\Traits\ModelAppendsTrait;
use Innoboxrr\LaravelAudit\Support\Traits\Auditable;
use Innoboxrr\ConsultantManager\Models\Traits\Relations\ConsulteeRelations;
use Innoboxrr\ConsultantManager\Models\Traits\Storage\ConsulteeStorage;
use Innoboxrr\ConsultantManager\Models\Traits\Assignments\ConsulteeAssignment;
use Innoboxrr\ConsultantManager\Models\Traits\Operations\ConsulteeOperations;
use Innoboxrr\ConsultantManager\Models\Traits\Mutators\ConsulteeMutators;

class Consultee extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        ModelAppendsTrait,
        Auditable,
        ConsulteeRelations,
        ConsulteeStorage,
        ConsulteeAssignment,
        ConsulteeOperations,
        ConsulteeMutators;
        
    protected $fillable = [
        'status',
        'consultant_id',
        'user_id',
    ];

    protected $creatable = [
        'status',
        'consultant_id',
        'user_id',
    ];

    protected $updatable = [
        'status',
        'consultant_id',
    ];

    protected $casts = [
        //CASTS//
    ];

    protected $protected_metas = [];

    protected $editable_metas = [
        //EDITABLEMETAS//
    ];

    public static $export_cols = [
        'id',
        'status',
        'consultant_id',
        'user_id',
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
        return \Innoboxrr\ConsultantManager\Database\Factories\ConsulteeFactory::new();
    }
    */

}
