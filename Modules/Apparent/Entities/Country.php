<?php

namespace Modules\Apparent\Entities;

use App\BaseModel;

class Country extends BaseModel
{
    public function states()
    {
    	return $this->hasMany(State::class);
    }
}
