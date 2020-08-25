<?php

namespace Modules\Apparent\Entities;

use App\BaseModel;

class Address extends BaseModel
{
    public function clients()
    {
    	return $this->hasMany('Modules\Client\Entities\Client');
    }

    public function apparentes()
    {
    	return $this->hasMany('Modules\Apparent\Entities\Apparent');
    }

    public function admins()
    {
    	return $this->hasMany('Modules\Admin\Entities\Admin');
    }

    public function shops()
    {
    	return $this->hasMany('Modules\Admin\Entities\Shop');
    }
}
