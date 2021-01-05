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
            $shops = array_merge($shops,$town->shops($numberOfShopInEachArea));
        }
        return $shops;
    }

    public function yearlyLgaClientIdentifications()
    {
        return $this->hasMany('Modules\Client\Entities\YearlyLgaClientIdentification');
    }

    public function getIdentification()
    {   
        $identification = null;

        foreach ($this->yearlyLgaClientIdentifications->where('year',date('Y')) as $clientIdentification) {
            $identification = $clientIdentification;
        }
        
        if($identification){
           return $identification;
        }

        return $this->yearlyLgaClientIdentifications()->create(['year'=>date('Y')]);
        
    }
}
