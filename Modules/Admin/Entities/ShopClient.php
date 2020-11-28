<?php

namespace Modules\Admin\Entities;

use App\BaseModel;

class ShopClient extends BaseModel
{
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function client()
    {
    	return $this->belongsTo('Modules\Client\Entities\Client');
    }

    public function shopClientWorks()
    {
        return $this->hasMany(ShopClientWork::class);
    }

    public function shopClientReferralBonuses()
    {
        return $this->hasMany('Modules\Client\Entities\ShopClientReferralBonus');
    }
}
