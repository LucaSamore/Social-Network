<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

final class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids;

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'surname',
        'username',
        'email',
        'password',
        'date_of_birth',
        'bio',
        'number_of_followers',
        'number_of_followees',
        'profile_image',
        'email_verified_at',
        'remember_token',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    public function reposts()
    {
        return $this->belongsToMany(Post::class, 'reposts', 'user_id')->using(Repost::class);
    }

    public function followers()
    {
        return $this->hasMany(Follower::class, 'followee', 'id');
    }

    public function followees()
    {
        return $this->hasMany(Follower::class, 'follower', 'id');
    }

    public function notificationsFrom()
    {
        return $this->belongsToMany(User::class, 'notifications', 'from')->using(Notification::class);
    }

    public function notificationsTo()
    {
        return $this->belongsToMany(User::class, 'notifications', 'to')->using(Notification::class);
    }

    public function likes()
    {
        return $this->belongsToMany(Post::class, 'likes', 'user_id')->using(Like::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likesOnComments()
    {
        return $this->belongsToMany(Comment::class, 'likes_on_comment', 'user_id')->using(LikesOnComment::class);
    }

    public function bookmarks()
    {
        return $this->belongsToMany(Post::class, 'bookmarks', 'user_id')->using(Bookmark::class);
    }
}
