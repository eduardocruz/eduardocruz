<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
