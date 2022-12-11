<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Bookmark extends Pivot
{
    use HasFactory, HasUuids;

    protected $table = 'bookmarks';
    public $incrementing = false;
    public $timestamps = false;
}
