<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationType extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = 'name';
    protected $keyType = 'string';

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
