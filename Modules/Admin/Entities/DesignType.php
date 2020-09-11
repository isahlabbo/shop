<?php

namespace Modules\Admin\Entities;

use App\BaseModel;

class DesignType extends BaseModel
{
    public function shops()
    {
    	return $this->hasMany(Shop::class);
    }
}
