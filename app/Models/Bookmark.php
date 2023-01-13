<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Bookmark extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id',
        'created_at',
        'user_id',
        'post_id'
    ];

    protected $table = 'bookmarks';
    public $incrementing = false;
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
