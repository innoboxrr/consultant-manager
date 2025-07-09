<?php

namespace Innoboxrr\ConsultantManager\Http\Events\ConsultationAppointment\Listeners\ExportEvent;

use Innoboxrr\ConsultantManager\Notifications\ConsultationAppointment\ExportNotification;
use Innoboxrr\ConsultantManager\Http\Events\ConsultationAppointment\Events\ExportEvent;
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