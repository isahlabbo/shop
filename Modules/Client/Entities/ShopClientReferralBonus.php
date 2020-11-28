<?php

namespace Modules\Client\Entities;

use App\BaseModel;

class ShopClientReferralBonus extends BaseModel
{
    public function shopClient()
    {
    	return $this->belongsTo('Modules\Admin\Entities\ShopClient');
    }

    public function shopClientWork()
    {
    	return $this->belongsTo('Modules\Admin\Entities\ShopClientWork');
    }
}
