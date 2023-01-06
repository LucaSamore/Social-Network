<?php

namespace App\Http\Controllers;

use App\Http\Traits\TrendTrait;
use App\Models\Notification;
use App\Models\NotificationType;
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
        $notifications = Notification::where('to', User::where('username', $username)->first()->id)
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        return view('notifications', [
            'notifications' => $notifications, 
            'trends' => $this->topTrends()
        ]);
    }
}
