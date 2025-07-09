<?php

namespace Innoboxrr\ConsultantManager\Http\Events\ConsulteeRecordCategory\Events;

use Innoboxrr\ConsultantManager\Models\ConsulteeRecordCategory;
use Illuminate\Support\Facades\App;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UpdateEvent
{

    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $consulteeRecordCategory;
    public $data;
    public $response;
    public $locale;

    public function __construct(ConsulteeRecordCategory $consulteeRecordCategory, array $data, $response, $locale = 'en')
    {
        $this->consulteeRecordCategory = $consulteeRecordCategory;
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