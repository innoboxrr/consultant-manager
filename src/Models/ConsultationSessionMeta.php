<?php

namespace Innoboxrr\ConsultantManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ConsultationSessionMeta extends Model
{

    use HasFactory;

    protected $guarded = [];

    public function consultationSession()
    {
        return $this->belongsTo(ConsultationSession::class);
    }

}
