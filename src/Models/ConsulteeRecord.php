<?php

namespace Innoboxrr\ConsultantManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use Innoboxrr\Traits\ModelAppendsTrait;
use Innoboxrr\ConsultantManager\Models\Traits\Relations\ConsulteeRecordRelations;
use Innoboxrr\ConsultantManager\Models\Traits\Storage\ConsulteeRecordStorage;
use Innoboxrr\ConsultantManager\Models\Traits\Assignments\ConsulteeRecordAssignment;
use Innoboxrr\ConsultantManager\Models\Traits\Operations\ConsulteeRecordOperations;
use Innoboxrr\ConsultantManager\Models\Traits\Mutators\ConsulteeRecordMutators;

class ConsulteeRecord extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        ModelAppendsTrait,
        ConsulteeRecordRelations,
        ConsulteeRecordStorage,
        ConsulteeRecordAssignment,
        ConsulteeRecordOperations,
        ConsulteeRecordMutators;
        
    protected $fillable = [
        'status',
        'payload',
        'consultee_id',
    ];

    protected $creatable = [
        'status',
        'payload',
        'consultee_id',
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
        'consultee_id',
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
        return \Innoboxrr\ConsultantManager\Database\Factories\ConsulteeRecordFactory::new();
    }
    */

}
