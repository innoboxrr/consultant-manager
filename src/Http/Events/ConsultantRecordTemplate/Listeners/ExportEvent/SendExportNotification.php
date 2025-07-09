<?php

namespace Innoboxrr\ConsultantManager\Http\Events\ConsultantRecordTemplate\Listeners\ExportEvent;

use Innoboxrr\ConsultantManager\Notifications\ConsultantRecordTemplate\ExportNotification;
use Innoboxrr\ConsultantManager\Http\Events\ConsultantRecordTemplate\Events\ExportEvent;
use Illuminate\Support\Facades\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendExportNotification
{

    public function __construct()
    {
        //
    }

    public function handle(ExportEvent $event)
    {
        $event->user->notify((new ExportNotification($event->data))->locale($event->locale));
    }

}