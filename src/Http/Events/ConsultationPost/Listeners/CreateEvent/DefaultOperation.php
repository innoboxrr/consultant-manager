<?php

namespace Innoboxrr\ConsultantManager\Http\Events\ConsultationPost\Listeners\CreateEvent;

use Innoboxrr\ConsultantManager\Http\Events\ConsultationPost\Events\CreateEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DefaultOperation
{
    
    public function __construct()
    {
        //
    }

    public function handle(CreateEvent $event)
    {
        //
    }

}
