<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'user_id',
        'textual_content',
        'created_at',
        'number_of_likes',
        'number_of_comments',
        'number_of_reposts'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function reposts()
    {
        return $this->belongsToMany(User::class, 'reposts', 'post_id')->using(Repost::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes', 'post_id')->using(Like::class);
    }

    public function comments()
    {
        return $this->belongsToMany(User::class, 'comments', 'post_id')->using(Comment::class);
    }

    public function bookmarks()
    {
        return $this->belongsToMany(User::class, 'bookmarks', 'post_id')->using(Bookmark::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tags_in_post', 'post_id')->using(TagsInPost::class);
    }
}
