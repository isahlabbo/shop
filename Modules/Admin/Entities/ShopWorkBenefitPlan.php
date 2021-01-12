<?php

namespace Modules\Admin\Entities;

use App\BaseModel;

class ShopWorkBenefitPlan extends BaseModel
{
    public function shop()
    {
    	return $this->belongsTo(Shop::class);
    }
}
