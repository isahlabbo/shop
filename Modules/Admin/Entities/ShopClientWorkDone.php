<?php

namespace Modules\Admin\Entities;

use App\BaseModel;

class ShopClientWorkDone extends BaseModel
{
    public function shopClientWork()
    {
    	return $this->belongsTo(ShopClientWork::class);
    }
}
