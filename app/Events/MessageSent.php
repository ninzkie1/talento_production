<?php
namespace App\Events;

use App\Models\Chat;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $chat;

    public function __construct(Chat $chat)
    {
        $this->chat = $chat->load('sender:id,name,image_profile');
    }

    public function broadcastOn()
    {
        return ['chat-channel'];
    }

    public function broadcastAs()
    {
        return 'message.sent';
    }
    public function broadcastWith()
    {
        return [
            'chat' => [
                'id' => $this->chat->id,
                'sender_id' => $this->chat->sender_id,
                'sender' => $this->chat->sender,
                'message' => $this->chat->message,
                'created_at' => $this->chat->created_at,
                'group_chat_id' => $this->chat->group_chat_id,
                'receiver_id' => $this->chat->receiver_id,
                'seen_by' => $this->chat->seen_by
            ]
        ];
    }
}
