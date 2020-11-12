<?php

namespace Modules\Admin\Entities;

use App\BaseModel;

class ShopDesignRequest extends BaseModel
{
    public function client()
    {
    	return $this->belongsTo('Modules\Client\Entities\Client');
    }

    public function shopDesign()
    {
    	return $this->belongsTo(ShopDesign::class);
    }
}
