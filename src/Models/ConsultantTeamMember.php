<?php

namespace Innoboxrr\ConsultantManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use Innoboxrr\Traits\ModelAppendsTrait;
use Innoboxrr\LaravelAudit\Support\Traits\Auditable;
use Innoboxrr\ConsultantManager\Models\Traits\Relations\ConsultantTeamMemberRelations;
use Innoboxrr\ConsultantManager\Models\Traits\Storage\ConsultantTeamMemberStorage;
use Innoboxrr\ConsultantManager\Models\Traits\Assignments\ConsultantTeamMemberAssignment;
use Innoboxrr\ConsultantManager\Models\Traits\Operations\ConsultantTeamMemberOperations;
use Innoboxrr\ConsultantManager\Models\Traits\Mutators\ConsultantTeamMemberMutators;

class ConsultantTeamMember extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        ModelAppendsTrait,
        Auditable,
        ConsultantTeamMemberRelations,
        ConsultantTeamMemberStorage,
        ConsultantTeamMemberAssignment,
        ConsultantTeamMemberOperations,
        ConsultantTeamMemberMutators;
        
    protected $fillable = [
        'status',
        'role',
        'consultant_id',
        'user_id',
    ];

    protected $creatable = [
        'status',
        'role',
        'consultant_id',
        'user_id',
    ];

    protected $updatable = [
        'status',
        'role',
    ];

    protected $casts = [
        //
    ];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public static $export_cols = [
        'id',
        'status',
        'role',
        'consultant_id',
        'user_id',
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
        return \Innoboxrr\ConsultantManager\Database\Factories\ConsultantTeamMemberFactory::new();
    }
    */

}
