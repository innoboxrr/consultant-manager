<?php

namespace Innoboxrr\ConsultantManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use Innoboxrr\Traits\ModelAppendsTrait;
use Innoboxrr\ConsultantManager\Models\Traits\Relations\ConsultationServiceRelations;
use Innoboxrr\ConsultantManager\Models\Traits\Storage\ConsultationServiceStorage;
use Innoboxrr\ConsultantManager\Models\Traits\Assignments\ConsultationServiceAssignment;
use Innoboxrr\ConsultantManager\Models\Traits\Operations\ConsultationServiceOperations;
use Innoboxrr\ConsultantManager\Models\Traits\Mutators\ConsultationServiceMutators;

class ConsultationService extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        ModelAppendsTrait,
        ConsultationServiceRelations,
        ConsultationServiceStorage,
        ConsultationServiceAssignment,
        ConsultationServiceOperations,
        ConsultationServiceMutators;
        
    protected $fillable = [
        'title',
        'status',
        'type',
        'description',
        'payload',
        'duration',
        'requires_approval',
        'consultant_id',
    ];

    protected $creatable = [
        'title',
        'status',
        'type',
        'description',
        'payload',
        'duration',
        'requires_approval',
        'consultant_id',
    ];

    protected $updatable = [
        'title',
        'status',
        'type',
        'description',
        'payload',
        'duration',
        'requires_approval',
    ];

    protected $casts = [
        'payload' => 'array',
        'requires_approval' => 'boolean',
        'duration' => 'integer',
    ];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public static $export_cols = [
        'id',
        'title',
        'status',
        'type',
        'description',
        'payload',
        'duration',
        'requires_approval',
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
        return \Innoboxrr\ConsultantManager\Database\Factories\ConsultationServiceFactory::new();
    }
    */

}
