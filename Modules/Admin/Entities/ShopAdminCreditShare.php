<?php

namespace Modules\Admin\Entities;

use App\BaseModel;

class ShopAdminCreditShare extends BaseModel
{
    public function shopAdmin()
    {
    	return $this->belongsTo(ShopAdmin::class);
    }
}
