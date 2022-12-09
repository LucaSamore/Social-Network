<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repost extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'textual_content'
    ];
}
