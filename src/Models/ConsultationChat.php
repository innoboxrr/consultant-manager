<?php

namespace Innoboxrr\ConsultantManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use Innoboxrr\Traits\ModelAppendsTrait;
use Innoboxrr\ConsultantManager\Models\Traits\Relations\ConsultationChatRelations;
use Innoboxrr\ConsultantManager\Models\Traits\Storage\ConsultationChatStorage;
use Innoboxrr\ConsultantManager\Models\Traits\Assignments\ConsultationChatAssignment;
use Innoboxrr\ConsultantManager\Models\Traits\Operations\ConsultationChatOperations;
use Innoboxrr\ConsultantManager\Models\Traits\Mutators\ConsultationChatMutators;

class ConsultationChat extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        ModelAppendsTrait,
        ConsultationChatRelations,
        ConsultationChatStorage,
        ConsultationChatAssignment,
        ConsultationChatOperations,
        ConsultationChatMutators;
        
    protected $fillable = [
        'consultation_session_id',
    ];

    protected $creatable = [
        'consultation_session_id',
    ];

    protected $updatable = [
        'consultation_session_id',
    ];

    protected $casts = [];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public static $export_cols = [
        'id',
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
        return \Innoboxrr\ConsultantManager\Database\Factories\ConsultationChatFactory::new();
    }
    */

}
