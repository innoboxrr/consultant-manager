<?php

namespace Innoboxrr\ConsultantManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use Innoboxrr\Traits\ModelAppendsTrait;
use Innoboxrr\LaravelAudit\Support\Traits\Auditable;
use Innoboxrr\ConsultantManager\Models\Traits\Relations\ConsultationPostAttachmentRelations;
use Innoboxrr\ConsultantManager\Models\Traits\Storage\ConsultationPostAttachmentStorage;
use Innoboxrr\ConsultantManager\Models\Traits\Assignments\ConsultationPostAttachmentAssignment;
use Innoboxrr\ConsultantManager\Models\Traits\Operations\ConsultationPostAttachmentOperations;
use Innoboxrr\ConsultantManager\Models\Traits\Mutators\ConsultationPostAttachmentMutators;

class ConsultationPostAttachment extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        ModelAppendsTrait,
        Auditable,
        ConsultationPostAttachmentRelations,
        ConsultationPostAttachmentStorage,
        ConsultationPostAttachmentAssignment,
        ConsultationPostAttachmentOperations,
        ConsultationPostAttachmentMutators;
        
    protected $fillable = [
        'path',
        'consultation_post_id',
    ];

    protected $creatable = [
        'path',
        'consultation_post_id',
    ];

    protected $updatable = [
        'path',
    ];

    protected $casts = [];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public static $export_cols = [
        'id',
        'path',
        'consultation_post_id',
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
        return \Innoboxrr\ConsultantManager\Database\Factories\ConsultationPostAttachmentFactory::new();
    }
    */

}
