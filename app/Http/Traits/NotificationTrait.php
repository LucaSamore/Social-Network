<?php

namespace App\Http\Traits;

use App\Models\Notification;

trait NotificationTrait {
    
    private function storeNotification(string $sender, string $receiver, string $notificationType)
    {
        if ($sender === $receiver) {
            return;
        }

        $notification = new Notification([
            'from' => $sender, 
            'to' => $receiver,
            'type' =>  $notificationType, 
            'created_at' => date("Y-m-d H:i:s"),
            'read' => 0
        ]);

        return $notification->save();
    }

    public function notifyFollow(string $sender, string $receiver)
    {
        $this->storeNotification($sender, $receiver, "ha iniziato a seguirti");
    }

    public function notifyLikeToPost(string $sender, string $receiver)
    {
        $this->storeNotification($sender, $receiver, "ha messo mi piace ad un tuo post");
    }

    public function notifyCommentToPost(string $sender, string $receiver)
    {
        $this->storeNotification($sender, $receiver, "ha commentato un tuo post");  
    }

    public function notifyLikeToComment(string $sender, string $receiver)
    {
        $this->storeNotification($sender, $receiver, "ha messo mi piace ad un tuo commento");  
    }

    private function toRead(string $receiver)
    {
        return Notification::where('to', $receiver)
            ->where('read', 0)
            ->count() > 0;
    }
}