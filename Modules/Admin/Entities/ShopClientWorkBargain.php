<?php

namespace Modules\Admin\Entities;

use App\BaseModel;

class ShopClientWorkBargain extends BaseModel
{
    
	public function shopClientWork()
	{
		return $this->belongsTo(ShopClientWork::class);
	}

	public function admin()
	{
		return $this->belongsTo(Admin::class);
	}
    
    public function client()
	{
		return $this->belongsTo('Modules\Client\Entities\Client');
	}

}
