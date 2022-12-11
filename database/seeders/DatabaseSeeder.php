<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Bookmark;
use App\Models\Comment;
use App\Models\Follower;
use App\Models\Like;
use App\Models\Notification;
use App\Models\NotificationType;
use App\Models\Post;
use App\Models\Repost;
use App\Models\Tag;
use App\Models\TagsInPost;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(50)->create();
        Post::factory()->count(100)->create();
        NotificationType::factory()->count(4)->create();
        Tag::factory()->count(100)->create();
        Like::factory()->count(20)->create();
        Repost::factory()->count(10)->create();
        Comment::factory()->count(100)->create();
        TagsInPost::factory()->count(20)->create();
        Bookmark::factory()->count(20)->create();
        Follower::factory()->count(100)->create();
        Notification::factory()->count(50)->create();
    }
}
