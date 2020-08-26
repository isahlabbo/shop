<?php

namespace Modules\Admin\Entities;

use App\BaseModel;

class Shop extends BaseModel
{
    public function address()
    {
    	return $this->belongsTo('Modules\Client\Entities\Address');
    }
    
    public function clients()
    {
    	return $this->hasMany('Modules\Client\Entities\Client');
    }

    public function apparents()
    {
    	return $this->hasMany('Modules\Apparent\Entities\Apparent');
    }

    public function admin()
    {
    	return $this->belongsTo(Admin::class);
    }

}
