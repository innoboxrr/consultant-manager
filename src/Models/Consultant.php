<?php

namespace Innoboxrr\ConsultantManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use Innoboxrr\Traits\ModelAppendsTrait;
use Innoboxrr\LaravelAudit\Support\Traits\Auditable;
use Innoboxrr\ConsultantManager\Models\Traits\Relations\ConsultantRelations;
use Innoboxrr\ConsultantManager\Models\Traits\Storage\ConsultantStorage;
use Innoboxrr\ConsultantManager\Models\Traits\Assignments\ConsultantAssignment;
use Innoboxrr\ConsultantManager\Models\Traits\Operations\ConsultantOperations;
use Innoboxrr\ConsultantManager\Models\Traits\Mutators\ConsultantMutators;
use Innoboxrr\ConsultantManager\Models\Enums\Consultant\Status;
use Innoboxrr\ConsultantManager\Models\Enums\Consultant\Type;

class Consultant extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        ModelAppendsTrait,
        Auditable,
        ConsultantRelations,
        ConsultantStorage,
        ConsultantAssignment,
        ConsultantOperations,
        ConsultantMutators;
        
    protected $fillable = [
        'type',
        'status',
        'payload',
        'user_id',
        'verified_at',
        'last_active_at',
        'onboarded_at',
    ];

    protected $creatable = [
        'type',
        'status',
        'payload',
        'user_id',
        'verified_at',
        'last_active_at',
        'onboarded_at',
    ];

    protected $updatable = [
        'type',
        'status',
        'payload',
        'verified_at',
        'last_active_at',
        'onboarded_at',
    ];

    protected $casts = [
        'status' => Status::class,
        'type' => Type::class,
        'payload' => 'array',
        'verified_at' => 'datetime',
        'last_active_at' => 'datetime',
        'onboarded_at' => 'datetime',
    ];

    protected $protected_metas = [];

    protected $editable_metas = [
        'specialities',
        'region',

        // Payouts
        'payouts_currency',
        'payouts_iban',
        'payouts_bank_name',
        'payouts_beneficiary',
        'payouts_tax_id',
        'payouts_payment_method',

        // Profile
        'profile_summary',
        'profile_rating',
        'profile_reviews_count',

        // Nested arrays (se manipulan desde frontend)
        'credentials',         // [{ name, number, expires_at }]
        'documents',           // [{ type, url, verified }]
    ];

    public static $export_cols = [
        'id',
        'type',
        'status',
        'payload',
        'user_id',
        'verified_at',
        'last_active_at',
        'onboarded_at',
        'created_at',
        'updated_at',
    ];

    public static $loadable_relations = [
        'user',
        'consultees',
        'teamMembers',
        'recordTemplates',
        'availabilities',
        'services',
    ];

    public static $loadable_counts = [
        'consultees',
        'teamMembers',
        'recordTemplates',
        'availabilities',
        'services',
    ];

    protected static function newFactory()
    {
        return \Innoboxrr\ConsultantManager\Database\Factories\ConsultantFactory::new();
    }

}
