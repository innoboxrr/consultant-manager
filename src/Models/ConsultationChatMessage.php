<?php

namespace Innoboxrr\ConsultantManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use Innoboxrr\Traits\ModelAppendsTrait;
use Innoboxrr\LaravelAudit\Support\Traits\Auditable;
use Innoboxrr\ConsultantManager\Models\Traits\Relations\ConsultationChatMessageRelations;
use Innoboxrr\ConsultantManager\Models\Traits\Storage\ConsultationChatMessageStorage;
use Innoboxrr\ConsultantManager\Models\Traits\Assignments\ConsultationChatMessageAssignment;
use Innoboxrr\ConsultantManager\Models\Traits\Operations\ConsultationChatMessageOperations;
use Innoboxrr\ConsultantManager\Models\Traits\Mutators\ConsultationChatMessageMutators;

class ConsultationChatMessage extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        ModelAppendsTrait,
        Auditable,
        ConsultationChatMessageRelations,
        ConsultationChatMessageStorage,
        ConsultationChatMessageAssignment,
        ConsultationChatMessageOperations,
        ConsultationChatMessageMutators;
        
    protected $fillable = [
        'content',
        'file_path',
        'response_to',
        'owner_type',
        'owner_id',
        'consultation_chat_id',
    ];

    protected $creatable = [
        'content',
        'file_path',
        'response_to',
        'owner_type',
        'owner_id',
        'consultation_chat_id',
    ];

    protected $updatable = [
        'content',
        'file_path',
    ];

    protected $casts = [
        'response_to' => 'integer',
    ];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public static $export_cols = [
        'id',
        'content',
        'file_path',
        'response_to',
        'owner_type',
        'owner_id',
        'consultation_chat_id',
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
        return \Innoboxrr\ConsultantManager\Database\Factories\ConsultationChatMessageFactory::new();
    }
    */

}
