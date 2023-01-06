<?php

namespace App\Http\Controllers;

use App\Http\Traits\TrendTrait;
use App\Models\Notification;
use App\Models\User;

final class NotificationController extends Controller
{
    use TrendTrait;

    /**
     * Display the specified resource.
     *
     * @param  string $username
     * @return \Illuminate\Http\Response
     */
    public function show(string $username)
    {
        $user_id = User::where('username', $username)->first()->id;
        $notifications = Notification::where('to', $user_id)
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        $this->readAll($user_id);

        return view('notifications', [
            'notifications' => $notifications, 
            'trends' => $this->topTrends()
        ]);
    }

    private function readAll(string $user_id)
    {
        return Notification::where('to', $user_id)->where('read', 0)->update(['read' => 1]);
    }
}
