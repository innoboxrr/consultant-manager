<?php

namespace Innoboxrr\ConsultantManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Innoboxrr\Traits\MetaOperations;
use Innoboxrr\Traits\ModelAppendsTrait;
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
        ConsultationAppointmentRelations,
        ConsultationAppointmentStorage,
        ConsultationAppointmentAssignment,
        ConsultationAppointmentOperations,
        ConsultationAppointmentMutators;
        
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
        return \Innoboxrr\ConsultantManager\Database\Factories\ConsultationAppointmentFactory::new();
    }
    */

}
