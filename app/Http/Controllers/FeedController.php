<?php

namespace App\Http\Controllers;

use App\Http\Traits\NotificationTrait;
use App\Http\Traits\TrendTrait;
use App\Models\Follower;
use App\Models\Post;
use Illuminate\Http\Request;

final class FeedController extends Controller
{
    use TrendTrait, NotificationTrait;

    public function feed(Request $request)
    {
        return view('/home', [
            'feeds' => $this->recentPosts($request->session()->get('user_id')),
            'trends' => $this->topTrends(),
            'isRead' => $this->toRead($request->session()->get('user_id'))
        ]);
    }

    private function recentPosts(string $user_id)
    {
        return Post::whereIn('user_id', 
            Follower::select('followee')
                ->where('follower', $user_id)
                ->get()
                ->toArray())
            ->orderBy('created_at')
            ->limit(50)
            ->get();
    }
}
