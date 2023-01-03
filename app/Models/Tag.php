<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Tag extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = 'name';
    protected $keyType = 'string';

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'tags_in_post', 'tag_name')->using(TagsInPost::class);
    }
}
