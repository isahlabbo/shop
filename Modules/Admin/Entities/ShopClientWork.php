<?php

namespace Modules\Admin\Entities;

use App\BaseModel;

class ShopClientWork extends BaseModel
{
    public function shopClient()
    {
        return $this->belongsTo(ShopClient::class);
    }

    public function shopClientReferralBonuses()
    {
        return $this->hasOne('Modules\Client\Entities\ShopClientReferralBonus');
    }
}
