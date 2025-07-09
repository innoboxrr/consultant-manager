<?php

namespace Innoboxrr\ConsultantManager\Http\Events\ConsultationAdvice\Listeners\CreateEvent;

use Innoboxrr\ConsultantManager\Http\Events\ConsultationAdvice\Events\CreateEvent;
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
