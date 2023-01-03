<?php

namespace App\Http\Controllers;

use App\Http\Traits\TrendTrait;
use App\Models\Follower;
use App\Models\Post;
use Illuminate\Http\Request;

final class FeedController extends Controller
{
    use TrendTrait;

    public function feed(Request $request)
    {
        $feeds = $this->recentPosts($request->session()->get('user_id'));

        return view('/home', [
            'feeds' => $feeds,
            'trends' => $this->topTrends(),
        ]);
    }

    private function recentPosts(string $user_id)
    {
        return Post::whereIn('user_id', 
            Follower::select('follower')
                ->where('followee', $user_id)
                ->get()
                ->toArray())
            ->orderBy('created_at')
            ->limit(50)
            ->get();
    }
}
