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
        'textual_content'
    ];

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
        return $this->belongsToMany(User::class)->using(Repost::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class)->using(Like::class);
    }

    public function comments()
    {
        return $this->belongsToMany(User::class)->using(Comment::class);
    }

    public function bookmarks()
    {
        return $this->belongsToMany(User::class)->using(Bookmark::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->using(TagsInPost::class);
    }
}
