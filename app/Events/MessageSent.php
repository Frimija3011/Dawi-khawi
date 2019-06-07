<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use App\User;
use App\Models\MessageUser;

class MessageSent implements ShouldBroadcast
{
    use  Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $user;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, MessageUser $message)
    {
          $this->user = $user;
          $this->message = $message;          
                    
          //$this->dontBroadcastToCurrentUser();
    }
    
    /**
     * Get the channels the event should broadcast on. 
     * @return type
     */
    public function broadcastOn()
    {
        return new PresenceChannel('chat');
    }
}
