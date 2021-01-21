<?php

namespace Modules\Admin\Entities;

use App\BaseModel;

class Shop extends BaseModel
{
    public function address()
    {
    	return $this->belongsTo('Modules\Apparent\Entities\Address');
    }
    
    public function shopClients()
    {
    	return $this->hasMany(ShopClient::class);
    }
    
    public function shopDesigns()
    {
    	return $this->hasMany(ShopDesign::class);
    }

    public function clientShopSubscriptions()
    {
        return $this->hasMany(ClientShopSubscription::class);
    }

    public function apparents()
    {
    	return $this->hasMany('Modules\Apparent\Entities\Apparent');
    }

    public function clientShopReferralBonuses()
    {
        return $this->hasMany('Modules\Client\Entities\ClientShopReferralBonus');
    }

    public function shopReferralPlan()
    {
        return $this->hasOne(ShopReferralPlan::class);
    }

    public function shopWorkBenefitPlan()
    {
        return $this->hasOne(ShopWorkBenefitPlan::class);
    }

    public function designType()
    {
    	return $this->belongsTo(DesignType::class);
    }

    public function admin()
    {
    	return $this->belongsTo(Admin::class);
    }

    public function programmes()
    {
    	return $this->hasMany(Programme::class);
    }

    public function shopAdmins()
    {
        return $this->hasMany(ShopAdmin::class);
    }


    public function availablePaidBonus()
    {
        $bonuses = [];
        foreach ($this->shopClients as $shopClient) {
            foreach ($shopClient->shopClientReferralBonuses->where('status',1) as $referralBonus) {
                $bonuses[] = $referralBonus;
            }
        }
        return $bonuses;
    }

    public function availableUnPaidBonus()
    {
        $bonuses = [];
        foreach ($this->shopClients as $shopClient) {
            foreach ($shopClient->shopClientReferralBonuses->where('status',0) as $referralBonus) {
                $bonuses[] = $referralBonus;
            }
        }
        return $bonuses;
    }

    public function availablePaidReferralBonusBalance()
    {
        $balance = 0;
        foreach ($this->availablePaidBonus() as $bonus) {
            $balance = $balance + $bonus->amount;
        }
        return $balance;
    }

    public function availableUnPaidReferralBonusBalance()
    {
        $balance = 0;
        foreach ($this->availableUnPaidBonus() as $bonus) {
            $balance = $balance + $bonus->amount;
        }
        return $balance;
    }

    public function availablUnPaidWorks()
    {
        $works = [];
        foreach ($this->shopClients as $shopClient) {
            foreach ($shopClient->shopClientWorks as $shopClientWork) {
                if($shopClientWork->paid_fee < $shopClientWork->fee){
                    $works[] = $shopClientWork;
                }
            }
        }
        return $works;
    }

    public function availablPaidWorks()
    {
        $works = [];
        foreach ($this->shopClients as $shopClient) {
            foreach ($shopClient->shopClientWorks as $shopClientWork) {
                if($shopClientWork->paid_fee > 0){
                    $works[] = $shopClientWork;
                }
            }
        }
        return $works;
    }

    public function allRegisteredWorks()
    {
        $works = [];
        foreach ($this->shopClients as $shopClient) {
            foreach ($shopClient->shopClientWorks as $shopClientWork) {
                $works[] = $shopClientWork;
            }
        }
        return $works;
    }

    public function paidWorks()
    {
        $works = [];
        foreach ($this->shopClients as $shopClient) {
            foreach ($shopClient->shopClientWorks as $shopClientWork) {
                if($shopClientWork->paid_fee > 0)
                    $works[] = $shopClientWork;
            }
        }
        return $works;
    }

    public function pendingPaymentWorks()
    {
        $works = [];
        foreach ($this->shopClients as $shopClient) {
            foreach ($shopClient->shopClientWorks as $shopClientWork) {
                if($shopClientWork->paid_fee < $shopClientWork->fee)
                    $works[] = $shopClientWork;
            }
        }
        return $works;
    }

    public function availableWorks()
    {
        $works = [];
        foreach ($this->shopClients as $shopClient) {
            foreach ($shopClient->shopClientWorks->where('status',0) as $shopClientWork) {
                $works[] = $shopClientWork;
            }
        }
        return $works;
    }

    public function availablePaidBalance()
    {
        $balance = 0;
        foreach ($this->availablPaidWorks() as $work) {
            $balance = $balance+$work->paid_fee;
        }
        return $balance;
    }

    public function availableBalance()
    {
        $balance = 0;
        foreach ($this->shopClients as $shopClient) {
            foreach ($shopClient->shopClientWorks as $work) {
                $balance = $balance + $work->fee;
            }
        }
        return $balance;
    }

    public function availableUnPaidBalance()
    {
        $balance = 0;
        foreach ($this->availablUnPaidWorks() as $work) {
            $balance = $balance+$work->pendingPayment();
        }
        return $balance;
    }

    public function workExpectedToBeCompletedToaday()
    {
        $works = [];
        foreach ($this->availableWorks() as $work) {
            if($work->remeningDaysToComplete() <= 1){
                $works[] = $work;
            }
        }
        return $works;
    }

    public function availableWorksToBargain()
    {
        $works = [];
        foreach ($this->availableWorks() as $work) {
            if($work->fee == 0){
                $works[] = $work;
            }
        }
        return $works;
    }

}
