<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Models\Entities\EventPost as EventPostEntity;

class EventPosted
{
    use InteractsWithSockets, SerializesModels;

    public $event;

    public $input;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(EventPostEntity $event, $input)
    {
        $this->event = $event;
        $this->input = $input;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
