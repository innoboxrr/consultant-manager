<?php

namespace Innoboxrr\ConsultantManager\Http\Events\ConsultationEvaluation\Events;

use Innoboxrr\ConsultantManager\Models\ConsultationEvaluation;
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

    public $consultationEvaluation;
    public $data;
    public $response;
    public $locale;

    public function __construct(ConsultationEvaluation $consultationEvaluation, array $data, $response, $locale = 'en')
    {
        $this->consultationEvaluation = $consultationEvaluation;
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