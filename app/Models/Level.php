<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{

    use \Sushi\Sushi;

    protected $rows = [
        [
            'id' => 0,
            'name' => 'Level 0',
        ],
        [
            'id' => 1,
            'name' => 'Level 1',
        ],
        [
            'id' => 2,
            'name' => 'Level 2',
        ],
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'level');
    }
}
