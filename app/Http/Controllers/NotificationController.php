<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\NotificationType;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(User $userId, int $n)
    {
        echo Notification::where('to', $userId->id)->orderBy('created_at', 'desc')->take($n)->get();
        return View('Notification');
    }

  
    private function store(User $userDo, User $userReceive, NotificationType $notificationType){
        $notification = new Notification([
            'from' => $userDo->id, 
            'to' => $userReceive->id, 
            'type' =>  $notificationType->name, 
            'created_at' => date("Y-m-d H:i:s"),
        ]); 
        $notification->save();  
    }

    public function notifyFollow(User $userDo, User $userReceive){
    
        NotificationController::store($userDo, $userReceive, NotificationType::findOrFail("ha iniziato a seguirti"));  
        return "ciao1";
    }

    public function notifyLikeToPost(User $userDo, User $userReceive){
        NotificationController::store($userDo, $userReceive, NotificationType::findOrFail("ha messo mi piace ad un tuo post"));  
        return back();
    }

    public function notifyCommentToPost(User $userDo, User $userReceive){
        NotificationController::store($userDo, $userReceive, NotificationType::findOrFail("ha commentato un tuo post"));  
        return back();
    }

    public function notifyLikeToComment(User $userDo, User $userReceive){
        NotificationController::store($userDo, $userReceive, NotificationType::findOrFail("ha messo mi piace ad un tuo commento"));  
        return back();
    }

    


}
