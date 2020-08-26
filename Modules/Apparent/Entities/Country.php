<?php

namespace Modules\Apparent\Entities;

use App\BaseModel;

class Country extends Model
{
    public function states()
    {
    	return $this->hasMany(State::class);
    }
}
