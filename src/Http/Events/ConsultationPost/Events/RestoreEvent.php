<?php

namespace Innoboxrr\ConsultantManager\Http\Events\ConsultationPost\Events;

use Innoboxrr\ConsultantManager\Models\ConsultationPost;
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

    public $consultationPost;
    public $data;
    public $response;
    public $locale;

    public function __construct(ConsultationPost $consultationPost, array $data, $response, $locale = 'en')
    {
        $this->consultationPost = $consultationPost;
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