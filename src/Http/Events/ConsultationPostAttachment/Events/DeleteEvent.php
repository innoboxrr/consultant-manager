<?php

namespace Innoboxrr\ConsultantManager\Http\Events\ConsultationPostAttachment\Events;

use Innoboxrr\ConsultantManager\Models\ConsultationPostAttachment;
use Illuminate\Support\Facades\App;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DeleteEvent
{

    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $consultationPostAttachment;
    public $data;
    public $response;
    public $locale;

    public function __construct(ConsultationPostAttachment $consultationPostAttachment, array $data, $response, $locale = 'en')
    {
        $this->consultationPostAttachment = $consultationPostAttachment;
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