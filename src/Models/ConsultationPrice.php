<?php

namespace Innoboxrr\ConsultantManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use Innoboxrr\Traits\ModelAppendsTrait;
use Innoboxrr\ConsultantManager\Models\Traits\Relations\ConsultationPriceRelations;
use Innoboxrr\ConsultantManager\Models\Traits\Storage\ConsultationPriceStorage;
use Innoboxrr\ConsultantManager\Models\Traits\Assignments\ConsultationPriceAssignment;
use Innoboxrr\ConsultantManager\Models\Traits\Operations\ConsultationPriceOperations;
use Innoboxrr\ConsultantManager\Models\Traits\Mutators\ConsultationPriceMutators;

class ConsultationPrice extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        ModelAppendsTrait,
        ConsultationPriceRelations,
        ConsultationPriceStorage,
        ConsultationPriceAssignment,
        ConsultationPriceOperations,
        ConsultationPriceMutators;
        
    protected $fillable = [
        'type',
        'amount',
        'payload',
        'consulting_service_id',
    ];

    protected $creatable = [
        'type',
        'amount',
        'payload',
        'consulting_service_id',
    ];

    protected $updatable = [
        'type',
        'amount',
        'payload',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'payload' => 'array',
    ];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public static $export_cols = [
        'id',
        'type',
        'amount',
        'payload',
        'consulting_service_id',
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
        return \Innoboxrr\ConsultantManager\Database\Factories\ConsultationPriceFactory::new();
    }
    */

}
