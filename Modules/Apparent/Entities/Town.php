<?php

namespace Modules\Apparent\Entities;

use App\BaseModel;

class Town extends BaseModel
{
    public function areas()
    {
    	return $this->hasMany(Area::class);
    }

    public function lga()
    {
    	return $this->belongsTo(Lga::class);
    }
}
