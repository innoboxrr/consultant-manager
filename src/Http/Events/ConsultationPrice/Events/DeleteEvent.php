<?php

namespace Innoboxrr\ConsultantManager\Http\Events\ConsultationPrice\Events;

use Innoboxrr\ConsultantManager\Models\ConsultationPrice;
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

    public $consultationPrice;
    public $data;
    public $response;
    public $locale;

    public function __construct(ConsultationPrice $consultationPrice, array $data, $response, $locale = 'en')
    {
        $this->consultationPrice = $consultationPrice;
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