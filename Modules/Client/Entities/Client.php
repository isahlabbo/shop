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
        return $this->belongsTo('Modules\Apparent\Entities\Address');
    }

    public function femaleMeasure()
    {
        return $this->hasOne(FemaleMeasure::class);
    }

    public function maleMeasure()
    {
        return $this->hasOne(MaleMeasure::class);
    }

    public function shopClients()
    {
    	return $this->hasMany('Modules\Admin\Entities\ShopClient');
    }
    
    public function clientFamilyMembers()
    {
        return $this->hasMany(ClientFamilyMember::class);
    }

    

    public function measurement()
    {
        $measurement = null;

        if($this->gender->id == 1){
            if(is_null($measurement)){
                $this->maleMeasure()->create([]);
            }
            $measurement = $this->maleMeasure;
        }else{
            if(is_null($measurement)){
                $this->femaleMeasure()->create([]);
            }
            $measurement = $this->femaleMeasure;
        }

        return $measurement;
        
    }

    
}
