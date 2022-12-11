<?php

use Illuminate\Support\Facades\DB;

class DuplicatesHelper
{
    public static function removeDuplicates()
    {
        (new self)->removeLikesDuplicates();
        (new self)->removeFollowersDuplicates();
        (new self)->removeNotificationsDuplicates();
        (new self)->removeBookmarksDuplicates();
        (new self)->removeTagsInPostDuplicates();
        (new self)->removeLikesOnCommentDuplicates();
    }

    private function removeLikesDuplicates()
    {
        $like = DB::table('likes')
            ->selectRaw('user_id, post_id, count(id) as duplicates')
            ->groupBy('user_id', 'post_id')
            ->having('duplicates', '>', 1)
            ->get();

        if($like->isEmpty()) return;

        DB::table('likes')
            ->where('user_id', '=', $like[0]->user_id)
            ->where('post_id', '=', $like[0]->post_id)
            ->delete();
    }

    private function removeFollowersDuplicates()
    {
        $follower = DB::table('followers')
            ->selectRaw('follower, followee, count(id) as duplicates')
            ->groupBy('follower', 'followee')
            ->having('duplicates', '>', 1)
            ->get();

        if($follower->isEmpty()) return;

        DB::table('followers')
            ->where('follower', '=', $follower[0]->follower)
            ->where('followee', '=', $follower[0]->followee)
            ->delete();
    }

    private function removeNotificationsDuplicates()
    {
        $notification = DB::table('notifications')
            ->selectRaw('notifications.from, notifications.to, count(id) as duplicates')
            ->groupBy('notifications.from', 'notifications.to')
            ->having('duplicates', '>', 1)
            ->get();
        
        if($notification->isEmpty()) return;

        DB::table('notifications')
            ->where('notifications.from', '=', $notification[0]->from)
            ->where('notifications.to', '=', $notification[0]->to)
            ->delete();
    }

    private function removeBookmarksDuplicates()
    {
        $bookmark = DB::table('bookmarks')
            ->selectRaw('user_id, post_id, count(id) as duplicates')
            ->groupBy('user_id', 'post_id')
            ->having('duplicates', '>', 1)
            ->get();

        if($bookmark->isEmpty()) return;

        DB::table('bookmarks')
            ->where('user_id', '=', $bookmark[0]->user_id)
            ->where('post_id', '=', $bookmark[0]->post_id)
            ->delete();
    }

    private function removeTagsInPostDuplicates()
    {
        $tagInPost = DB::table('tags_in_post')
            ->selectRaw('tag_name, post_id, count(id) as duplicates')
            ->groupBy('tag_name', 'post_id')
            ->having('duplicates', '>', 1)
            ->get();

        if($tagInPost->isEmpty()) return;

        DB::table('tags_in_post')
            ->where('tag_name', '=', $tagInPost[0]->tag_name)
            ->where('post_id', '=', $tagInPost[0]->post_id)
            ->delete();
    }

    private function removeLikesOnCommentDuplicates()
    {
        $likeOnComment = DB::table('likes_on_comment')
            ->selectRaw('user_id, comment_id, count(id) as duplicates')
            ->groupBy('user_id', 'comment_id')
            ->having('duplicates', '>', 1)
            ->get();

        if($likeOnComment->isEmpty()) return;

        DB::table('likes_on_comment')
            ->where('user_id', '=', $likeOnComment[0]->user_id)
            ->where('comment_id', '=', $likeOnComment[0]->comment_id)
            ->delete();
    }
}