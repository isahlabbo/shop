<?php

namespace Modules\Client\Entities;

use App\BaseModel;

class YearlyAddressClientIdentification extends BaseModel
{
    public function clients()
    {
    	return $this->hasMany(Client::class);
    }

    public function address()
    {
        return $this->belongsTo('Modules\Apparent\Entities\Address');
    }


}
