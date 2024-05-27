<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $user;
    public $category;

    public function __construct($user, $message, $category)
    {
        $this->user = $user;
        $this->message = $message;
        $this->category = $category;
    }

    public function broadcastOn()
    {
        return new Channel('public-chat-' . $this->category);
    }
}

