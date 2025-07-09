<?php

namespace Innoboxrr\ConsultantManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ConsultationServiceMeta extends Model
{

    use HasFactory;

    protected $guarded = [];

    public function consultationService()
    {
        return $this->belongsTo(ConsultationService::class);
    }

}
