<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiRequestLog extends Model
{
    //
    public function scopeLaterThan($query, $days)
    {
        return $query->whereDate('created_at', '<=', now()->subDays($days));
    }
}
