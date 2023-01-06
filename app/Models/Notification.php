<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

final class Notification extends Pivot
{
    use HasFactory, HasUuids;

    protected $table = 'notifications';
    public $incrementing = false;
    public $timestamps = false;

    public function notificationType()
    {
        return $this->belongsTo(NotificationType::class, 'type', 'name');
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'from');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'to');
    }
}
