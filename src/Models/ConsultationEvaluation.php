<?php

namespace Innoboxrr\ConsultantManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use Innoboxrr\Traits\ModelAppendsTrait;
use Innoboxrr\ConsultantManager\Models\Traits\Relations\ConsultationEvaluationRelations;
use Innoboxrr\ConsultantManager\Models\Traits\Storage\ConsultationEvaluationStorage;
use Innoboxrr\ConsultantManager\Models\Traits\Assignments\ConsultationEvaluationAssignment;
use Innoboxrr\ConsultantManager\Models\Traits\Operations\ConsultationEvaluationOperations;
use Innoboxrr\ConsultantManager\Models\Traits\Mutators\ConsultationEvaluationMutators;

class ConsultationEvaluation extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        ModelAppendsTrait,
        ConsultationEvaluationRelations,
        ConsultationEvaluationStorage,
        ConsultationEvaluationAssignment,
        ConsultationEvaluationOperations,
        ConsultationEvaluationMutators;
        
    protected $fillable = [
        'rating',
        'comment',
        'status',
        'consultation_session_id',
    ];

    protected $creatable = [
        'rating',
        'comment',
        'status',
        'consultation_session_id',
    ];

    protected $updatable = [
        'rating',
        'comment',
        'status',
    ];

    protected $casts = [
        'rating' => 'integer',
    ];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public static $export_cols = [
        'id',
        'rating',
        'comment',
        'status',
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
        return \Innoboxrr\ConsultantManager\Database\Factories\ConsultationEvaluationFactory::new();
    }
    */

}
