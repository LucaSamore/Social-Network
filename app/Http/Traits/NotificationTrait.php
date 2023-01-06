<?php

namespace App\Http\Traits;

use App\Models\Notification;

trait NotificationTrait {
    
    private function storeNotification(string $sender, string $receiver, string $notificationType)
    {
        $notification = new Notification([
            'from' => $sender, 
            'to' => $receiver,
            'type' =>  $notificationType, 
            'created_at' => date("Y-m-d H:i:s"),
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
}