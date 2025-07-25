<?php

namespace Innoboxrr\ConsultantManager\Http\Events\Consultee\Events;

use Illuminate\Support\Facades\App;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ExportEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $data;
    public $user;
    public $locale;

    public function __construct(array $data, $user, $locale = 'en')
    {
        $this->data = $data;
        $this->user = $user;
        $this->locale = $locale;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
    
}