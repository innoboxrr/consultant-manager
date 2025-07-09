<?php

namespace Innoboxrr\ConsultantManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ConsultationPaymentMeta extends Model
{

    use HasFactory;

    protected $guarded = [];

    public function consultationPayment()
    {
        return $this->belongsTo(ConsultationPayment::class);
    }

}
