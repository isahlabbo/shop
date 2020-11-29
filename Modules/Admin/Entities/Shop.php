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

}
