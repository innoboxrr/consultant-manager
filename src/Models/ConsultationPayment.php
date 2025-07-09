<?php

namespace Innoboxrr\ConsultantManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use Innoboxrr\Traits\ModelAppendsTrait;
use Innoboxrr\ConsultantManager\Models\Traits\Relations\ConsultationPaymentRelations;
use Innoboxrr\ConsultantManager\Models\Traits\Storage\ConsultationPaymentStorage;
use Innoboxrr\ConsultantManager\Models\Traits\Assignments\ConsultationPaymentAssignment;
use Innoboxrr\ConsultantManager\Models\Traits\Operations\ConsultationPaymentOperations;
use Innoboxrr\ConsultantManager\Models\Traits\Mutators\ConsultationPaymentMutators;

class ConsultationPayment extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        ModelAppendsTrait,
        ConsultationPaymentRelations,
        ConsultationPaymentStorage,
        ConsultationPaymentAssignment,
        ConsultationPaymentOperations,
        ConsultationPaymentMutators;
        
    protected $fillable = [
        'status',
        'revenue',
        'fee',
        'amount',
        'payload',
        'consultation_price_id',
        'consultation_session_id',
    ];

    protected $creatable = [
        'status',
        'revenue',
        'fee',
        'amount',
        'payload',
        'consultation_price_id',
        'consultation_session_id',
    ];

    protected $updatable = [
        'status',
        'revenue',
        'fee',
        'amount',
        'payload',
    ];

    protected $casts = [
        'revenue' => 'decimal:2',
        'fee' => 'decimal:2',
        'amount' => 'decimal:2',
        'payload' => 'array',
    ];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public static $export_cols = [
        'id',
        'status',
        'revenue',
        'fee',
        'amount',
        'payload',
        'consultation_price_id',
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
        return \Innoboxrr\ConsultantManager\Database\Factories\ConsultationPaymentFactory::new();
    }
    */

}
