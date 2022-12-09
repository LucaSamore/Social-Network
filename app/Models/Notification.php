<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Notification extends Pivot
{
    use HasFactory, HasUuids;

    public $incrementing = false;
    public $timestamps = false;

    public function notificationType()
    {
        return $this->belongsTo(NotificationType::class, 'type', 'name');
    }
}
