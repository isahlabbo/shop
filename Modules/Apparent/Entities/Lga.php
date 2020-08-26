<?php

namespace Modules\Apparent\Entities;

use App\BaseModel;

class Lga extends BaseModel
{
    public function towns()
    {
    	return $this->hasMany(Town::class);
    }

    public function state()
    {
    	return $this->belongsTo(State::class);
    }
}
