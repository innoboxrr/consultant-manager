<?php

namespace Innoboxrr\ConsultantManager\Http\Events\ConsultationAppointment\Events;

use Innoboxrr\ConsultantManager\Models\ConsultationAppointment;
use Illuminate\Support\Facades\App;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RestoreEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $consultationAppointment;
    public $data;
    public $response;
    public $locale;

    public function __construct(ConsultationAppointment $consultationAppointment, array $data, $response, $locale = 'en')
    {
        $this->consultationAppointment = $consultationAppointment;
        $this->data = $data;
        $this->response = $response;
        $this->locale = $locale;
        App::setLocale($this->locale);
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }

}