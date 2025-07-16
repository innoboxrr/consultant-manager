<?php

namespace Innoboxrr\ConsultantManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use Innoboxrr\Traits\ModelAppendsTrait;
use Innoboxrr\LaravelAudit\Support\Traits\Auditable;
use Innoboxrr\ConsultantManager\Models\Traits\Relations\ConsultationSessionServiceRelations;
use Innoboxrr\ConsultantManager\Models\Traits\Storage\ConsultationSessionServiceStorage;
use Innoboxrr\ConsultantManager\Models\Traits\Assignments\ConsultationSessionServiceAssignment;
use Innoboxrr\ConsultantManager\Models\Traits\Operations\ConsultationSessionServiceOperations;
use Innoboxrr\ConsultantManager\Models\Traits\Mutators\ConsultationSessionServiceMutators;

class ConsultationSessionService extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        ModelAppendsTrait,
        Auditable,
        ConsultationSessionServiceRelations,
        ConsultationSessionServiceStorage,
        ConsultationSessionServiceAssignment,
        ConsultationSessionServiceOperations,
        ConsultationSessionServiceMutators;
        
    protected $fillable = [
        'status',
        'responses',
        'consultation_service_id',
        'consultation_session_id',
    ];

    protected $creatable = [
        'status',
        'responses',
        'consultation_service_id',
        'consultation_session_id',
    ];

    protected $updatable = [
        'status',
        'responses',
    ];

    protected $casts = [
        'responses' => 'array',
    ];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public static $export_cols = [
        'id',
        'status',
        'responses',
        'consultation_service_id',
        'consultation_session_id',
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
        return \Innoboxrr\ConsultantManager\Database\Factories\ConsultationSessionServiceFactory::new();
    }
    */

}
