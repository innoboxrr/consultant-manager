<?php

namespace Innoboxrr\ConsultantManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use Innoboxrr\Traits\ModelAppendsTrait;
use Innoboxrr\LaravelAudit\Support\Traits\Auditable;
use Innoboxrr\ConsultantManager\Models\Traits\Relations\ConsultationAppointmentRelations;
use Innoboxrr\ConsultantManager\Models\Traits\Storage\ConsultationAppointmentStorage;
use Innoboxrr\ConsultantManager\Models\Traits\Assignments\ConsultationAppointmentAssignment;
use Innoboxrr\ConsultantManager\Models\Traits\Operations\ConsultationAppointmentOperations;
use Innoboxrr\ConsultantManager\Models\Traits\Mutators\ConsultationAppointmentMutators;

class ConsultationAppointment extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        ModelAppendsTrait,
        Auditable,
        ConsultationAppointmentRelations,
        ConsultationAppointmentStorage,
        ConsultationAppointmentAssignment,
        ConsultationAppointmentOperations,
        ConsultationAppointmentMutators;
        
    protected $fillable = [
        'type',
        'status',
        'start_time',
        'end_time',
        'payload',
        'room_url',
        'consultation_session_id',
    ];

    protected $creatable = [
        'type',
        'status',
        'start_time',
        'end_time',
        'payload',
        'room_url',
        'consultation_session_id',
    ];

    protected $updatable = [
        'type',
        'status',
        'start_time',
        'end_time',
        'payload',
        'room_url',
    ];

    protected $casts = [
        'start_time' => 'integer',
        'end_time' => 'integer',
        'payload' => 'array',
    ];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public static $export_cols = [
        'id',
        'type',
        'status',
        'start_time',
        'end_time',
        'payload',
        'room_url',
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
        return \Innoboxrr\ConsultantManager\Database\Factories\ConsultationAppointmentFactory::new();
    }
    */

}
