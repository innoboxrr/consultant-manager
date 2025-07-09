<?php

namespace Innoboxrr\ConsultantManager\Http\Events\ConsultantTeamMember\Events;

use Innoboxrr\ConsultantManager\Models\ConsultantTeamMember;
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

    public $consultantTeamMember;
    public $data;
    public $response;
    public $locale;

    public function __construct(ConsultantTeamMember $consultantTeamMember, array $data, $response, $locale = 'en')
    {
        $this->consultantTeamMember = $consultantTeamMember;
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