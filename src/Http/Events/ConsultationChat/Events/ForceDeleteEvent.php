<?php

namespace Innoboxrr\ConsultantManager\Http\Events\ConsultationChat\Events;

use Innoboxrr\ConsultantManager\Models\ConsultationChat;
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

    public $consultationChat;
    public $data;
    public $response;
    public $locale;

    public function __construct(ConsultationChat $consultationChat, array $data, $response, $locale = 'en')
    {
        $this->consultationChat = $consultationChat;
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