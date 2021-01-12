<?php

namespace Modules\Admin\Entities;

use App\BaseModel;

class ShopClientWorkAdminShare extends BaseModel
{
    public function shopClientWork()
	{
		return $this->belongsTo(ShopClientWork::class);
	}

	public function admin()
	{
		return $this->belongsTo(Admin::class);
	}
}
