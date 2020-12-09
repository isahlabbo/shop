<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class ShopClientWorkDone extends Model
{
    public function shopClientWork()
    {
    	return $this->belongsTo(ShopClientWork::class);
    }
}
