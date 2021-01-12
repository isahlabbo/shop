<?php

namespace Modules\Admin\Entities;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
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
        'image',
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

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }

    public function shopDesigns()
    {
        return $this->hasMany(ShopDesign::class);
    }

    public function shopClientWorkBargains()
    {
        return $this->hasMany(ShopClientWorkBargain::class);
    }
    public function gender()
    {
        return $this->belongsTo('Modules\Client\Entities\Gender');
    }

    public function address()
    {
        return $this->belongsTo('Modules\Apparent\Entities\Address');
    }

    public function shopAdmins()
    {
        return $this->hasMany(ShopAdmin::class);
    }

    public function shopClientWorkAdminShares()
    {
        return $this->hasMany(ShopClientWorkAdminShare::class);
    }

    public function getBenefit(ShopClientWork $work)
    {
        $benefit = null;
        foreach ($this->shopClientWorkAdminShares->where('shop_client_work_id',$work->id) as $workBenefit) {
            $benefit = $workBenefit;
        }

        return $benefit;
    }
    
    public function availableShopWorksToBargain()
    {
        $works = [];
        foreach ($this->shops as $shop) {
            foreach ($shop->availableWorks() as $work) {
                if($work->fee == 0){
                    $works[] = $work;
                }
            }
        }
        
        return $works;
    }
}