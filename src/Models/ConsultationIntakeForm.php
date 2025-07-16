<?php

namespace Innoboxrr\ConsultantManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use Innoboxrr\Traits\ModelAppendsTrait;
use Innoboxrr\LaravelAudit\Support\Traits\Auditable;
use Innoboxrr\ConsultantManager\Models\Traits\Relations\ConsultationIntakeFormRelations;
use Innoboxrr\ConsultantManager\Models\Traits\Storage\ConsultationIntakeFormStorage;
use Innoboxrr\ConsultantManager\Models\Traits\Assignments\ConsultationIntakeFormAssignment;
use Innoboxrr\ConsultantManager\Models\Traits\Operations\ConsultationIntakeFormOperations;
use Innoboxrr\ConsultantManager\Models\Traits\Mutators\ConsultationIntakeFormMutators;

class ConsultationIntakeForm extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        ModelAppendsTrait,
        Auditable,
        ConsultationIntakeFormRelations,
        ConsultationIntakeFormStorage,
        ConsultationIntakeFormAssignment,
        ConsultationIntakeFormOperations,
        ConsultationIntakeFormMutators;
        
    protected $fillable = [
        'questions',
        'consultation_session_id',
    ];

    protected $creatable = [
        'questions',
        'consultation_session_id',
    ];

    protected $updatable = [
        'questions',
    ];

    protected $casts = [
        'questions' => 'array',
    ];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public static $export_cols = [
        'id',
        'questions',
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
        return \Innoboxrr\ConsultantManager\Database\Factories\ConsultationIntakeFormFactory::new();
    }
    */

}
