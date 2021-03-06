<?php

namespace Gustavo82mdq\Eav\app\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class LoadTypesEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $types;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Array &$types)
    {
        $this->types = &$types;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
//    public function broadcastOn()
//    {
//        return new PrivateChannel('channel-name');
//    }
}
