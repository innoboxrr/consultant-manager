<?php

namespace Innoboxrr\ConsultantManager\Support\Traits;

use Innoboxrr\ConsultantManager\Models\Consultant;

trait IsConsultant
{
    public function consultant()
    {
        return $this->hasOne(Consultant::class);
    }

    public function isConsultant()
    {
        return $this->consultant()->exists();
    }
}