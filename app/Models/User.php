<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids;

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'username',
        'email',
        'password',
        'dateOfBirth',
        'bio',
        'profileImage',
        'bannerImage'
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
        return $this->belongsToMany(User::class, 'followers', 'follower')->using(Follower::class);
    }

    public function followees()
    {
        return $this->belongsToMany(User::class, 'followers', 'followees')->using(Follower::class);
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
        return $this->belongsToMany(Post::class, 'comments', 'user_id')->using(Comment::class);
    }

    public function bookmarks()
    {
        return $this->belongsToMany(Post::class, 'bookmarks', 'user_id')->using(Bookmark::class);
    }
}
