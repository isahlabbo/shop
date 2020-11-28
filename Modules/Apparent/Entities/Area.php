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

    public function shops($count)
    {
        $shops = [];
        foreach ($this->addresses as $address) {
            foreach ($address->shops as $shop) {
                if ($count != 'all' && count($shops) < $count) {
                    $shops[]=$shop;
                }else{
                    $shops[]=$shop;
                }
            }
        }
        return $shops;
    }
}
