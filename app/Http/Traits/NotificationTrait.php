<?php

namespace App\Http\Traits;

use App\Models\Notification;
use App\Models\NotificationType;

trait NotificationTrait {
    
    private function storeNotification(string $sender, string $receiver, NotificationType $notificationType)
    {
        $notification = new Notification([
            'from' => $sender, 
            'to' => $receiver, 
            'type' =>  $notificationType->name, 
            'created_at' => date("Y-m-d H:i:s"),
        ]);

        return $notification->save();
    }

    public function notifyFollow(string $sender, string $receiver)
    {
        $this->storeNotification($sender, $receiver, NotificationType::findOrFail("ha iniziato a seguirti"));
    }

    public function notifyLikeToPost(string $sender, string $receiver)
    {
        $this->storeNotification($sender, $receiver, NotificationType::findOrFail("ha messo mi piace ad un tuo post"));
    }

    public function notifyCommentToPost(string $sender, string $receiver)
    {
        $this->storeNotification($sender, $receiver, NotificationType::findOrFail("ha commentato un tuo post"));  
    }

    public function notifyLikeToComment(string $sender, string $receiver)
    {
        $this->storeNotification($sender, $receiver, NotificationType::findOrFail("ha messo mi piace ad un tuo commento"));  
    }
}