<?php

namespace App\Http\Controllers;

use App\Http\Traits\NotificationTrait;
use App\Http\Traits\TrendTrait;
use App\Http\Traits\UserTrait;
use App\Models\User;
use Illuminate\Http\Request;

final class SettingsController extends Controller
{
    use UserTrait, TrendTrait, NotificationTrait;

    public function settings(Request $request)
    {
        return view('settings', [
            'user' => User::findOrFail($request->session()->get('user_id')),
            'isRead' => $this->toRead($request->session()->get('user_id')),
            'trends' => $this->topTrends()
        ]);
    }
}
