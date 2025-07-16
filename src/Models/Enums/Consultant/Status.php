<?php

namespace Innoboxrr\ConsultantManager\Models\Enums\Consultant;

use Innoboxrr\Traits\EnumTrait;

class Status
{
    use EnumTrait;

    const ACTIVE = 'active';
    const INACTIVE = 'inactive';
    const PENDING = 'pending';   
}