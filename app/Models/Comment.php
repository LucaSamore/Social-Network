<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Comment extends Pivot
{
    use HasFactory, HasUuids;

    protected $table = 'comments';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'textual_content'
    ];
}
