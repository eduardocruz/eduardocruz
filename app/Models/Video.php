<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $casts = [
        'released_at' => 'datetime'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->using('App\Models\UserVideo')->withPivot([
            'created_at',
            'updated_at'
        ])->withTimestamps();
    }
}
