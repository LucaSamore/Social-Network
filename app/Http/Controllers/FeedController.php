<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\Image;
use App\Models\Post;
use App\Models\TagsInPost;
use App\Models\Video;
use Illuminate\Http\Request;

final class FeedController extends Controller
{
    public function feed(Request $request)
    {
        $feeds = $this->recentPosts($request->session()->get('user_id'));

        return view('/home', [
            'feeds' => $feeds,
            'images' => $this->images($feeds),
            'videos' => $this->videos($feeds),
            'trends' => $this->topTrends()
        ]);
    }

    private function followers(string $user_id)
    {
        return Follower::where('followee', $user_id)
            ->get()
            ->transform(fn($item, $key) => $item->follower)
            ->toArray();
    }

    private function recentPosts(string $user_id)
    {
        return Post::whereIn('user_id', $this->followers($user_id))
            ->orderBy('created_at')
            ->get()
            ->take(50)
            ->toArray();
    }

    private function images(array $posts)
    {
        $images = array();

        foreach ($posts as $post) {
            array_merge($images, [
                $post["id"] => Image::where('post_id', $post["id"])
                    ->get()
                    ->transform(fn($item, $key) => $item->path)
                    ->toArray()
            ]);
        }

        return $images;
    }

    private function videos(array $posts)
    {
        $videos = array();

        foreach ($posts as $post) {
            array_merge($videos, [
                $post["id"] => Video::where('post_id', $post["id"])
                    ->get()
                    ->transform(fn($item, $key) => $item->path)
                    ->toArray()
            ]);
        }

        return $videos;
    }

    private function topTrends()
    {
        $tags = TagsInPost::all()
            ->groupBy('tag_name')
            ->map
            ->count()
            ->toArray();

        arsort($tags);

        return array_slice($tags, 0, 5);
    }
}
