<?php

namespace Modules\Client\Entities;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Client extends Authenticatable
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
        'town',
        'area',
        'address',
        'email',
        'phone',
        'gender_id',
        'lga',
        'TID',
        'password',
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
        return $this->belongsTo(Gender::class);
    }

    public function address()
    {
        return $this->hasOne('Modules\Apparent\Entities\Address');
    }

    public function femaleMeasure()
    {
        return $this->hasOne(FemaleMeasure::class);
    }

    public function maleMeasure()
    {
        return $this->hasOne(FemaleMeasure::class);
    }

    
}
