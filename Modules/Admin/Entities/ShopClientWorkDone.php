<?php

namespace Modules\Admin\Entities;

use App\BaseModel;

class ShopClientWorkDone extends Model
{
    public function shopClientWork()
    {
    	return $this->belongsTo(ShopClientWork::class);
    }
}
