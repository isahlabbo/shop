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

    public function shops($numberOfShopInEachArea)
    {
        $shops = [];
        foreach ($this->towns as $town) {
            array_merge($shops,$town->shops($numberOfShopInEachArea));
        }
        return $shops;
    }
}
