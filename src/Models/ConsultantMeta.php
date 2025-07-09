<?php

namespace Innoboxrr\ConsultantManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ConsultantMeta extends Model
{

    use HasFactory;

    protected $guarded = [];

    public function consultant()
    {
        return $this->belongsTo(Consultant::class);
    }

}
