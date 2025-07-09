<?php

namespace Innoboxrr\ConsultantManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use Innoboxrr\Traits\ModelAppendsTrait;
use Innoboxrr\ConsultantManager\Models\Traits\Relations\ConsulteeRecordResponseRelations;
use Innoboxrr\ConsultantManager\Models\Traits\Storage\ConsulteeRecordResponseStorage;
use Innoboxrr\ConsultantManager\Models\Traits\Assignments\ConsulteeRecordResponseAssignment;
use Innoboxrr\ConsultantManager\Models\Traits\Operations\ConsulteeRecordResponseOperations;
use Innoboxrr\ConsultantManager\Models\Traits\Mutators\ConsulteeRecordResponseMutators;

class ConsulteeRecordResponse extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        ModelAppendsTrait,
        ConsulteeRecordResponseRelations,
        ConsulteeRecordResponseStorage,
        ConsulteeRecordResponseAssignment,
        ConsulteeRecordResponseOperations,
        ConsulteeRecordResponseMutators;
        
    protected $fillable = [
        'data',
        'responded_at',
        'updated_by_id',
        'consultee_record_item_id',
    ];

    protected $creatable = [
        'data',
        'responded_at',
        'updated_by_id',
        'consultee_record_item_id',
    ];

    protected $updatable = [
        'data',
        'responded_at',
        'updated_by_id',
    ];

    protected $casts = [
        'data' => 'array',
        'responded_at' => 'datetime',
    ];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public static $export_cols = [
        'id',
        'data',
        'responded_at',
        'updated_by_id',
        'consultee_record_item_id',
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
        return \Innoboxrr\ConsultantManager\Database\Factories\ConsulteeRecordResponseFactory::new();
    }
    */

}
