<?php

namespace Modules\Client\Entities;

use App\BaseModel;

class Gender extends BaseModel
{
    public function apparents()
    {
    	return $this->hasMany('Modules\Apparent\Entities\Apparent');
    }

    public function clients()
    {
    	return $this->hasMany('Modules\Apparent\Entities\Client');
    }

    public function admins()
    {
    	return $this->hasMany('Modules\Admin\Entities\Admin');
    }

}
