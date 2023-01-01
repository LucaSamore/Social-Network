<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

final class Comment extends Pivot
{
    use HasFactory, HasUuids;

    protected $table = 'comments';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'textual_content',
        'user_id',
        'post_id',
        'number_of_likes'
    ];

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes_on_comment', 'comment_id')->using(LikesOnComment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
