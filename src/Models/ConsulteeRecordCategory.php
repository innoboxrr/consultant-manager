<?php

namespace Innoboxrr\ConsultantManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use Innoboxrr\Traits\ModelAppendsTrait;
use Innoboxrr\ConsultantManager\Models\Traits\Relations\ConsulteeRecordCategoryRelations;
use Innoboxrr\ConsultantManager\Models\Traits\Storage\ConsulteeRecordCategoryStorage;
use Innoboxrr\ConsultantManager\Models\Traits\Assignments\ConsulteeRecordCategoryAssignment;
use Innoboxrr\ConsultantManager\Models\Traits\Operations\ConsulteeRecordCategoryOperations;
use Innoboxrr\ConsultantManager\Models\Traits\Mutators\ConsulteeRecordCategoryMutators;

class ConsulteeRecordCategory extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        ModelAppendsTrait,
        ConsulteeRecordCategoryRelations,
        ConsulteeRecordCategoryStorage,
        ConsulteeRecordCategoryAssignment,
        ConsulteeRecordCategoryOperations,
        ConsulteeRecordCategoryMutators;
        
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
        return \Innoboxrr\ConsultantManager\Database\Factories\ConsulteeRecordCategoryFactory::new();
    }
    */

}
