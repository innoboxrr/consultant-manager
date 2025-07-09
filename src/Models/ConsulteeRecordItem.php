<?php

namespace Innoboxrr\ConsultantManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use Innoboxrr\Traits\ModelAppendsTrait;
use Innoboxrr\ConsultantManager\Models\Traits\Relations\ConsulteeRecordItemRelations;
use Innoboxrr\ConsultantManager\Models\Traits\Storage\ConsulteeRecordItemStorage;
use Innoboxrr\ConsultantManager\Models\Traits\Assignments\ConsulteeRecordItemAssignment;
use Innoboxrr\ConsultantManager\Models\Traits\Operations\ConsulteeRecordItemOperations;
use Innoboxrr\ConsultantManager\Models\Traits\Mutators\ConsulteeRecordItemMutators;

class ConsulteeRecordItem extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        ModelAppendsTrait,
        ConsulteeRecordItemRelations,
        ConsulteeRecordItemStorage,
        ConsulteeRecordItemAssignment,
        ConsulteeRecordItemOperations,
        ConsulteeRecordItemMutators;
        
    protected $fillable = [
        //FILLABLE//
    ];

    protected $creatable = [
        //CREATABLE//
    ];

    protected $updatable = [
        //UPDATABLE//
    ];

    protected $casts = [
        //CASTS//
    ];

    protected $protected_metas = [];

    protected $editable_metas = [
        //EDITABLEMETAS//
    ];

    public static $export_cols = [
        //EXPORTCOLS//
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
        return \Innoboxrr\ConsultantManager\Database\Factories\ConsulteeRecordItemFactory::new();
    }
    */

}
