<?php

namespace Modules\Admin\Entities;

use App\BaseModel;

class ShopReferralPlan extends BaseModel
{
    public function shop()
    {
    	return $this->belongsTo(Shop::class);
    }
}
