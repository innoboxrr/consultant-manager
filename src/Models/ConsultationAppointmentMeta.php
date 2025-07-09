<?php

namespace Innoboxrr\ConsultantManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ConsultationAppointmentMeta extends Model
{

    use HasFactory;

    protected $guarded = [];

    public function consultationAppointment()
    {
        return $this->belongsTo(ConsultationAppointment::class);
    }

}
