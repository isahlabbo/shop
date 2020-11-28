<?php

namespace Modules\Apparent\Entities;

use App\BaseModel;

class State extends BaseModel
{
    public function lgas()
    {
    	return $this->hasMany(Lga::class);
    }

    public function country()
    {
    	return $this->belongsTo(Country::class);
    }

    public function shops($numberOfShopInEachArea)
    {
        $shops = [];
        foreach ($this->lgas as $lga) {
            $shops = array_merge($shops,$lga->shops($numberOfShopInEachArea));
        }
        return $shops;     
    }
}
