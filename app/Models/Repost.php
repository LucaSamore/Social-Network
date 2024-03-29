<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Repost extends Pivot
{
    use HasFactory, HasUuids;

    protected $table = 'reposts';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'textual_content'
    ];
}
