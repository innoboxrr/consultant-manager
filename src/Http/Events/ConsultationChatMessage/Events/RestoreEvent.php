<?php

namespace Innoboxrr\ConsultantManager\Http\Events\ConsultationChatMessage\Events;

use Innoboxrr\ConsultantManager\Models\ConsultationChatMessage;
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

    public $consultationChatMessage;
    public $data;
    public $response;
    public $locale;

    public function __construct(ConsultationChatMessage $consultationChatMessage, array $data, $response, $locale = 'en')
    {
        $this->consultationChatMessage = $consultationChatMessage;
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