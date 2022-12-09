<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TagsInPost extends Pivot
{
    use HasFactory, HasUuids;

    protected $table = 'tags_in_post';    
    public $incrementing = false;
    public $timestamps = false;
}
