<?php

namespace Innoboxrr\ConsultantManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use Innoboxrr\Traits\ModelAppendsTrait;
use Innoboxrr\LaravelAudit\Support\Traits\Auditable;
use Innoboxrr\ConsultantManager\Models\Traits\Relations\ConsultantRecordTemplateRelations;
use Innoboxrr\ConsultantManager\Models\Traits\Storage\ConsultantRecordTemplateStorage;
use Innoboxrr\ConsultantManager\Models\Traits\Assignments\ConsultantRecordTemplateAssignment;
use Innoboxrr\ConsultantManager\Models\Traits\Operations\ConsultantRecordTemplateOperations;
use Innoboxrr\ConsultantManager\Models\Traits\Mutators\ConsultantRecordTemplateMutators;

class ConsultantRecordTemplate extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        ModelAppendsTrait,
        Auditable,
        ConsultantRecordTemplateRelations,
        ConsultantRecordTemplateStorage,
        ConsultantRecordTemplateAssignment,
        ConsultantRecordTemplateOperations,
        ConsultantRecordTemplateMutators;
        
    protected $fillable = [
        'data',
        'consultant_id',
    ];

    protected $creatable = [
        'data',
        'consultant_id',
    ];

    protected $updatable = [
        'data',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public static $export_cols = [
        'id',
        'data',
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
        return \Innoboxrr\ConsultantManager\Database\Factories\ConsultantRecordTemplateFactory::new();
    }
    */

}
