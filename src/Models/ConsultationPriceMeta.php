<?php

namespace Innoboxrr\ConsultantManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ConsultationPriceMeta extends Model
{

    use HasFactory;

    protected $guarded = [];

    public function consultationPrice()
    {
        return $this->belongsTo(ConsultationPrice::class);
    }

}
