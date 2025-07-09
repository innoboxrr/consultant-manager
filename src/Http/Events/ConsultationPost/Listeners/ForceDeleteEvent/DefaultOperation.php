<?php

namespace Innoboxrr\ConsultantManager\Http\Events\ConsultationPost\Listeners\ForceDeleteEvent;

use Innoboxrr\ConsultantManager\Http\Events\ConsultationPost\Events\ForceDeleteEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DefaultOperation
{
    
    public function __construct()
    {
        //
    }

    public function handle(ForceDeleteEvent $event)
    {
        //
    }

}
