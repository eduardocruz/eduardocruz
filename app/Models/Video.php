<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $casts = [
        'released_at' => 'datetime'
    ];
}
