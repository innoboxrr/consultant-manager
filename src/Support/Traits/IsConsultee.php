<?php

namespace Innoboxrr\ConsultantManager\Support\Traits;

use Innoboxrr\ConsultantManager\Models\Consultee;

trait IsConsultee
{
    public function consultees()
    {
        return $this->hasMany(Consultee::class);
    }

    public function isConsultee()
    {
        return $this->consultees()->exists();
    }
}
