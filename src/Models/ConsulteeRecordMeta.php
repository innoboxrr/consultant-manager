<?php

namespace Innoboxrr\ConsultantManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ConsulteeRecordMeta extends Model
{

    use HasFactory;

    protected $guarded = [];

    public function consulteeRecord()
    {
        return $this->belongsTo(ConsulteeRecord::class);
    }

}
