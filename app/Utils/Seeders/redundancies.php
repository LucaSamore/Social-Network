<?php

use Illuminate\Support\Facades\DB;

class RedundancyHelper
{
    public static function updateRedundancies()
    {
        (new self)->updateFollowers();
        (new self)->updateFollowees();
        (new self)->updateLikesOnPost();
        (new self)->updateCommentsOnPost();
        (new self)->updateRepostsOnPost();
        (new self)->updateLikesOnComment();
    }

    private function updateFollowers()
    {
        DB::table('users')
            ->selectRaw('users.id, count(users.id) as howMany')
            ->join('followers', 'users.id', '=', 'followers.follower')
            ->groupBy('users.id')
            ->get()
            ->each(function ($item, $key) {
                DB::table('users')
                    ->where('id', $item->id)
                    ->update(['number_of_followers' => $item->howMany]);
            });
    }

    private function updateFollowees()
    {
        DB::table('users')
            ->selectRaw('users.id, count(users.id) as howMany')
            ->join('followers', 'users.id', '=', 'followers.followee')
            ->groupBy('users.id')
            ->get()
            ->each(function ($item, $key) {
                DB::table('users')
                    ->where('id', $item->id)
                    ->update(['number_of_followees' => $item->howMany]);
            });
    }

    private function updateLikesOnPost()
    {
        DB::table('posts')
            ->selectRaw('posts.id, count(posts.id) as howMany')
            ->join('likes', 'posts.id', '=', 'likes.post_id')
            ->groupBy('posts.id')
            ->get()
            ->each(function ($item, $key) {
                DB::table('posts')
                    ->where('id', $item->id)
                    ->update(['number_of_likes' => $item->howMany]);
            });
    }

    private function updateCommentsOnPost()
    {
        DB::table('posts')
            ->selectRaw('posts.id, count(posts.id) as howMany')
            ->join('comments', 'posts.id', '=', 'comments.post_id')
            ->groupBy('posts.id')
            ->get()
            ->each(function ($item, $key) {
                DB::table('posts')
                    ->where('id', $item->id)
                    ->update(['number_of_comments' => $item->howMany]);
            });
    }

    private function updateRepostsOnPost()
    {
        DB::table('posts')
            ->selectRaw('posts.id, count(posts.id) as howMany')
            ->join('reposts', 'posts.id', '=', 'reposts.post_id')
            ->groupBy('posts.id')
            ->get()
            ->each(function ($item, $key) {
                DB::table('posts')
                    ->where('id', $item->id)
                    ->update(['number_of_reposts' => $item->howMany]);
            });
    }


    private function updateLikesOnComment()
    {
        DB::table('comments')
            ->selectRaw('comments.id, count(comments.id) as howMany')
            ->join('likes_on_comment', 'comments.id', '=', 'likes_on_comment.comment_id')
            ->groupBy('comments.id')
            ->get()
            ->each(function ($item, $key) {
                DB::table('comments')
                    ->where('id', $item->id)
                    ->update(['number_of_likes' => $item->howMany]);
            });
    }
}