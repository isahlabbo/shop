<?php

namespace Modules\Admin\Entities;

use App\BaseModel;

class ShopClientWorkCollect extends BaseModel
{
    public function shopClientWork()
    {
    	return $this->belongsTo(ShopClientWork::class);
    }
}
