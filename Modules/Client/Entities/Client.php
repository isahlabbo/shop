<?php

namespace Modules\Client\Entities;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\Admin\Entities\Shop;
use Modules\Client\Services\AvailableShopTrait as HasShops;

class Client extends Authenticatable
{
    use Notifiable, HasShops;

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

    public function shopDesignRequests()
    {
    	return $this->hasMany('Modules\Client\Entities\ShopDesignRequest');
    }

    public function shopDesignLikes()
    {
    	return $this->hasMany('Modules\Client\Entities\ShopDesignLike');
    }

    public function getThisShopClient(Shop $shop)
    {
        foreach($this->shopClients->where('shop_id',$shop->id) as $shopClient){
            return $shopClient;
        }
    }
    
    public function clientFamilyMembers()
    {
        return $this->hasMany(ClientFamilyMember::class);
    }

    public function stageOfThisClient()
    {
        if(count($this->clientFamilyMembers) > 0){
            return 'super client';
        }else if($this->subClient()){
            return 'sub client';
        }else{
            return 'independent client';
        }
    }

    public function subClient()
    {
        $flag = false;
        foreach (ClientFamilyMember::where('family_member_id',$this->id)->get() as $client) {
            $flag = true;
        }
        return $flag;
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
