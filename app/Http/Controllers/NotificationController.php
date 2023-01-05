<?php

namespace App\Http\Controllers;

use App\Models\Follower;
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
        //$userId = $request->session()->get("user_id");
        $notifications = Notification::where('to', $userId->id)->orderBy('created_at', 'desc')->take($n)->get();
        
        $today = date_create(date('Y-m-d H:i:s'));
        foreach($notifications as $notify){
            $notifyDate = date_create($notify->created_at);
            //echo "today: ".$today->format('Y-m-d H:i:s')."<br>";
            //echo "notify: ".$notifyDate->format('Y-m-d H:i:s')."<br>";
            $diff = $today->diff($notifyDate);
            $notify->created_at = $diff->format('%a d %h h %i m %s s');
            $notify->fromUsername = User::findOrFail($notify->from)->username; 
            //echo $notify->from."<br>";
            //echo $userId->id."<br>";
            $notify->follow = Follower::where('follower',  $notify->from)->where('followee', $userId->id)->exists();
            //var_dump($notify->follow);
        }
        return View('Notification', ['notifications' => $notifications]);
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
