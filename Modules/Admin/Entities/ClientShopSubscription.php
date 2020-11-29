<?php

namespace Modules\Admin\Entities;

use App\BaseModel;

class ClientShopSubscription extends BaseModel
{
    public function client()
    {
    	return $this->belongsTo('Modules\Client\Entities\Client');
    }

    public function shop()
    {
    	return $this->belongsTo(Shop::class);
    }
}
