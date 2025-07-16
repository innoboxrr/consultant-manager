<?php

namespace Innoboxrr\ConsultantManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use Innoboxrr\Traits\ModelAppendsTrait;
use Innoboxrr\LaravelAudit\Support\Traits\Auditable;
use Innoboxrr\ConsultantManager\Models\Traits\Relations\ConsultationPostRelations;
use Innoboxrr\ConsultantManager\Models\Traits\Storage\ConsultationPostStorage;
use Innoboxrr\ConsultantManager\Models\Traits\Assignments\ConsultationPostAssignment;
use Innoboxrr\ConsultantManager\Models\Traits\Operations\ConsultationPostOperations;
use Innoboxrr\ConsultantManager\Models\Traits\Mutators\ConsultationPostMutators;

class ConsultationPost extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        ModelAppendsTrait,
        Auditable,
        ConsultationPostRelations,
        ConsultationPostStorage,
        ConsultationPostAssignment,
        ConsultationPostOperations,
        ConsultationPostMutators;
        
    protected $fillable = [
        'subject',
        'content',
        'payload',
        'parent_id',
        'owner_type',
        'owner_id',
    ];

    protected $creatable = [
        'subject',
        'content',
        'payload',
        'parent_id',
        'owner_type',
        'owner_id',
    ];

    protected $updatable = [
        'subject',
        'content',
        'payload',
    ];

    protected $casts = [
        'payload' => 'array',
    ];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public static $export_cols = [
        'id',
        'subject',
        'content',
        'payload',
        'parent_id',
        'owner_type',
        'owner_id',
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
        return \Innoboxrr\ConsultantManager\Database\Factories\ConsultationPostFactory::new();
    }
    */

}
