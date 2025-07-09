<?php

namespace Innoboxrr\ConsultantManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use Innoboxrr\Traits\ModelAppendsTrait;
use Innoboxrr\ConsultantManager\Models\Traits\Relations\ConsultationAppointmentAttendeeRelations;
use Innoboxrr\ConsultantManager\Models\Traits\Storage\ConsultationAppointmentAttendeeStorage;
use Innoboxrr\ConsultantManager\Models\Traits\Assignments\ConsultationAppointmentAttendeeAssignment;
use Innoboxrr\ConsultantManager\Models\Traits\Operations\ConsultationAppointmentAttendeeOperations;
use Innoboxrr\ConsultantManager\Models\Traits\Mutators\ConsultationAppointmentAttendeeMutators;

class ConsultationAppointmentAttendee extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        ModelAppendsTrait,
        ConsultationAppointmentAttendeeRelations,
        ConsultationAppointmentAttendeeStorage,
        ConsultationAppointmentAttendeeAssignment,
        ConsultationAppointmentAttendeeOperations,
        ConsultationAppointmentAttendeeMutators;
        
    protected $fillable = [
        'owner_type',
        'owner_id',
        'consultation_appointment_id',
    ];

    protected $creatable = [
        'owner_type',
        'owner_id',
        'consultation_appointment_id',
    ];

    protected $updatable = [
        'owner_type',
        'owner_id',
    ];

    protected $casts = [];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public static $export_cols = [
        'id',
        'owner_type',
        'owner_id',
        'consultation_appointment_id',
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
        return \Innoboxrr\ConsultantManager\Database\Factories\ConsultationAppointmentAttendeeFactory::new();
    }
    */

}
