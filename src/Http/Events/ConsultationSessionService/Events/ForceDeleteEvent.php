<?php

namespace Innoboxrr\ConsultantManager\Http\Events\ConsultationSessionService\Events;

use Innoboxrr\ConsultantManager\Models\ConsultationSessionService;
use Illuminate\Support\Facades\App;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ForceDeleteEvent
{

    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $consultationSessionService;
    public $data;
    public $response;
    public $locale;

    public function __construct(ConsultationSessionService $consultationSessionService, array $data, $response, $locale = 'en')
    {
        $this->consultationSessionService = $consultationSessionService;
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