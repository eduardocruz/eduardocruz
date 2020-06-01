<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Checkin extends Pivot
{
    protected $table = 'checkins';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function technology()
    {
        return $this->belongsTo(Technology::class);
    }
}
