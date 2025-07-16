<?php

namespace Innoboxrr\ConsultantManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use Innoboxrr\Traits\ModelAppendsTrait;
use Innoboxrr\LaravelAudit\Support\Traits\Auditable;
use Innoboxrr\ConsultantManager\Models\Traits\Relations\ConsultationSessionRelations;
use Innoboxrr\ConsultantManager\Models\Traits\Storage\ConsultationSessionStorage;
use Innoboxrr\ConsultantManager\Models\Traits\Assignments\ConsultationSessionAssignment;
use Innoboxrr\ConsultantManager\Models\Traits\Operations\ConsultationSessionOperations;
use Innoboxrr\ConsultantManager\Models\Traits\Mutators\ConsultationSessionMutators;

class ConsultationSession extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        ModelAppendsTrait,
        Auditable,
        ConsultationSessionRelations,
        ConsultationSessionStorage,
        ConsultationSessionAssignment,
        ConsultationSessionOperations,
        ConsultationSessionMutators;
        
    protected $fillable = [
        'status',
        'start_at',
        'end_at',
        'payload',
        'consultee_id',
    ];

    protected $creatable = [
        'status',
        'start_at',
        'end_at',
        'payload',
        'consultee_id',
    ];

    protected $updatable = [
        'status',
        'start_at',
        'end_at',
        'payload',
    ];

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
        'payload' => 'array',
    ];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public static $export_cols = [
        'id',
        'status',
        'start_at',
        'end_at',
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
        return \Innoboxrr\ConsultantManager\Database\Factories\ConsultationSessionFactory::new();
    }
    */

}
