<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Image extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id',
        'path',
        'post_id',
    ];

    public $incrementing = false;
    public $timestamps = false;

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
