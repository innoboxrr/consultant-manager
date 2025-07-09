<?php

namespace Innoboxrr\ConsultantManager\Http\Events\Consultant\Listeners\DeleteEvent;

use Innoboxrr\ConsultantManager\Http\Events\Consultant\Events\DeleteEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DefaultOperation
{
    
    public function __construct()
    {
        //
    }

    public function handle(DeleteEvent $event)
    {
        //
    }

}
