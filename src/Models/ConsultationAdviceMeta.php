<?php

namespace Innoboxrr\ConsultantManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ConsultationAdviceMeta extends Model
{

    use HasFactory;

    protected $guarded = [];

    public function consultationAdvice()
    {
        return $this->belongsTo(ConsultationAdvice::class);
    }

}
