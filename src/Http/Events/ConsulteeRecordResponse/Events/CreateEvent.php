<?php

namespace Innoboxrr\ConsultantManager\Http\Events\ConsulteeRecordResponse\Events;

use Innoboxrr\ConsultantManager\Models\ConsulteeRecordResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CreateEvent
{

    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $consulteeRecordResponse;
    public $data;
    public $response;
    public $locale;

    public function __construct(ConsulteeRecordResponse $consulteeRecordResponse, array $data, $response, $locale = 'en')
    {
        $this->consulteeRecordResponse = $consulteeRecordResponse;
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