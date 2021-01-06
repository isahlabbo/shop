<?php

namespace Modules\Client\Entities;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\Admin\Entities\Shop;
use Modules\Client\Services\AvailableShopTrait as HasShops;
use Modules\Client\Services\HasIdentificationNumber as Identifiable;
use Illuminate\Support\Facades\Hash;

class Client extends Authenticatable
{
    use Notifiable, HasShops, Identifiable;

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
        'yearly_lga_client_identification_id',
        'CIN',
        'referral_code',
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
    public function yearlyLgaClientIdentification()
    {
        return $this->belongsTo(YearlyLgaClientIdentification::class);
    }
    public function address()
    {
        return $this->belongsTo('Modules\Apparent\Entities\Address');
    }
    
    public function clientShopSubscriptions()
    {
        return $this->hasMany('Modules\Admin\Entities\ClientShopSubscription');
    }

    public function femaleMeasure()
    {
        return $this->hasOne(FemaleMeasure::class);
    }

    public function maleMeasure()
    {
        return $this->hasOne(MaleMeasure::class);
    }

    public function shopClientWorkBargains()
    {
        return $this->hasMany('Modules\Admin\Entities\ShopClientWorkBargain');
    }

    public function shopClients()
    {
    	return $this->hasMany('Modules\Admin\Entities\ShopClient');
    }

    public function shopDesignRequests()
    {
    	return $this->hasMany('Modules\Admin\Entities\ShopDesignRequest');
    }

    public function shopDesignLikes()
    {
    	return $this->hasMany('Modules\Admin\Entities\ShopDesignLike');
    }

    public function getThisShopClient(Shop $shop)
    {
        foreach($this->shopClients->where('shop_id',$shop->id) as $shopClient){
            return $shopClient;
        }
    }
    
    public function hasSubscription($shopId)
    {
        $flag = null;
        foreach ($this->clientShopSubscriptions->where('shop_id',$shopId) as $subscription) {
            $flag = true;
        }
        return $flag;
    }

    public function hasActiveSubscription($shopId)
    {
        $flag = null;
        foreach ($this->clientShopSubscriptions->where('shop_id',$shopId)->where('status',1) as $subscription) {
            $flag = true;
        }
        return $flag;
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
    
    public function availableBonusBalance()
    {
        $bonus = 0;
        foreach ($this->shopClients as $shopClient) {
            foreach ($shopClient->shopClientReferralBonuses as $referralBonus) {
                $balance = $referralBonus->amount - $referralBonus->paid_amount;
                $bonus = $bonus + $balance;
            }
        }
        return $bonus;
    }

    public function bonusEarnPaidFrom($client)
    {
        $bonus = 0;
        foreach ($client->shopClients as $shopClient) {
            foreach ($shopClient->shopClientWorks as $shopClientWork) {
                $bonus = $bonus + $shopClientWork->shopClientReferralBonus->paid_amount;
            }
            
        }
        
        return $bonus;
    }

    public function bonusEarnNotPaidFrom($client)
    {
        $bonus = 0;
            foreach ($client->shopClients as $shopClient) {
                foreach ($shopClient->shopClientWorks as $shopClientWork) {
                    $bonus = $bonus + $shopClientWork->shopClientReferralBonus->amount - $shopClientWork->shopClientReferralBonus->paid_amount;
                }
            }
        return $bonus;
    }

    public function bonusEarnFrom($client)
    {
        $bonus = 0;
        foreach ($client->shopClients as $shopClient) {
            foreach ($shopClient->shopClientWorks as $shopClientWork) {
                $bonus = $bonus + $shopClientWork->shopClientReferralBonus->amount;
            }
        }
        return $bonus;
    }

    public function availableWorks()
    {
        $works = [];
        foreach ($this->shopClients as $shopClient) {
            foreach ($shopClient->shopClientWorks as $shopClientWork) {
                if($shopClientWork->progress() != 'Collected')
                    $works[] = $shopClientWork;
            }
        }
        return $works;
    }

   public function updateInfor($data, $shopId)
   {
    
        $this->update([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'gender_id' => $data['gender'],
            'referral_code' => $data['referral_code'],
            'password' => Hash::make($data['password']),
        ]);
        foreach ($this->shopClients->where('shop_id',$shopId) as $shopClient) {
            $shopClient->update([
            'shop_id'=>$shopId,
            'refferal_code'=>$data['referral_code'],
            ]);
        } 

   }
    
}
