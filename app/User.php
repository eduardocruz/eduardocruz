<?php

namespace App;

use App\Models\Checkin;
use App\Models\Service;
use App\Models\Technology;
use App\Models\Video;
use Laravel\Spark\CanJoinTeams;
use Laravel\Spark\User as SparkUser;
use Multicaret\Acquaintances\Traits\CanBeFollowed;
use Multicaret\Acquaintances\Traits\CanFollow;

class User extends SparkUser
{

    //use CanJoinTeams;
    use CanFollow, CanBeFollowed;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'authy_id',
        'country_code',
        'phone',
        'two_factor_reset_code',
        'card_brand',
        'card_last_four',
        'card_country',
        'billing_address',
        'billing_address_line_2',
        'billing_city',
        'billing_zip',
        'billing_country',
        'extra_billing_information',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'trial_ends_at' => 'datetime',
        'uses_two_factor_auth' => 'boolean',
    ];

    public function technologies()
    {
        return $this->belongsToMany(Technology::class, 'checkins');
    }

    public function videos()
    {
        return $this->belongsToMany(Video::class);
    }

    public function checkins()
    {
        return $this->hasMany(Checkin::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function max_checkins()
    {
        return $this->checkins()->selectRaw('count(id) as total')->groupBy('technology_id')->get()->max('total');
    }
}
