<?php

namespace Modules\Apparent\Entities;

use App\BaseModel;

class Area extends BaseModel
{
    public function addresses()
    {
    	return $this->hasMany(Address::class);
    }

    public function town()
    {
    	return $this->belongsTo(Town::class);
    }
}
