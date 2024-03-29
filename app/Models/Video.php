<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Video extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'path',
        'post_id',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
