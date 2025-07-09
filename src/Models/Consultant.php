<?php

namespace Innoboxrr\ConsultantManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use Innoboxrr\Traits\ModelAppendsTrait;
use Innoboxrr\ConsultantManager\Models\Traits\Relations\ConsultantRelations;
use Innoboxrr\ConsultantManager\Models\Traits\Storage\ConsultantStorage;
use Innoboxrr\ConsultantManager\Models\Traits\Assignments\ConsultantAssignment;
use Innoboxrr\ConsultantManager\Models\Traits\Operations\ConsultantOperations;
use Innoboxrr\ConsultantManager\Models\Traits\Mutators\ConsultantMutators;

class Consultant extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        ModelAppendsTrait,
        ConsultantRelations,
        ConsultantStorage,
        ConsultantAssignment,
        ConsultantOperations,
        ConsultantMutators;
        
    protected $fillable = [
        'status',
        'payload',
        'user_id',
    ];

    protected $creatable = [
        'status',
        'payload',
        'user_id',
    ];

    protected $updatable = [
        'status',
        'payload',
    ];

    protected $casts = [
        'payload' => 'array',
    ];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public static $export_cols = [
        'id',
        'status',
        'payload',
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
        return \Innoboxrr\ConsultantManager\Database\Factories\ConsultantFactory::new();
    }
    */

}
