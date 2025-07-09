<?php

namespace Innoboxrr\ConsultantManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ConsultationPostMeta extends Model
{

    use HasFactory;

    protected $guarded = [];

    public function consultationPost()
    {
        return $this->belongsTo(ConsultationPost::class);
    }

}
