<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

final class Follower extends Pivot
{
    use HasFactory, HasUuids;

    protected $table = 'followers';
    public $incrementing = false;
    public $timestamps = false;

    public function follower()
    {
        return $this->belongsTo(User::class);
    }

    public function followee()
    {
        return $this->belongsTo(User::class);
    }
}
