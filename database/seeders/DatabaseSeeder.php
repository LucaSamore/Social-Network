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
use DuplicatesHelper;
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
        User::factory()->count(100)->create();
        Post::factory()->count(250)->create();
        NotificationType::factory()->count(4)->create();
        Tag::factory()->count(100)->create();
        Like::factory()->count(75)->create();
        Repost::factory()->count(50)->create();
        Comment::factory()->count(100)->create();
        TagsInPost::factory()->count(50)->create();
        Bookmark::factory()->count(50)->create();
        Follower::factory()->count(150)->create();
        Notification::factory()->count(150)->create();
        DuplicatesHelper::removeDuplicates();
    }
}
