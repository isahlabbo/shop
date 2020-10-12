<?php

namespace Modules\Apparent\Entities;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Apparent extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'password',
        'email',
        'phone',
        'gender_id',
        'religion_id',
        'tribe_id',
        'shop_id',
        'grantor_id',
        'programme_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function gender()
    {
        return $this->belongsTo('Modules\Client\Entities\Gender');
    }

    public function shop()
    {
        return $this->belongsTo('Modules\Admin\Entities\Shop');
    }

    public function religion()
    {
        return $this->belongsTo(Religion::class);
    }

    public function tribe()
    {
        return $this->belongsTo(Tribe::class);
    }

    public function grantor()
    {
        return $this->belongsTo(Grantor::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
