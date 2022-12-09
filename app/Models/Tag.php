<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = 'name';
    protected $keyType = 'string';

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'tags_in_post', 'tag_name')->using(TagsInPost::class);
    }
}
