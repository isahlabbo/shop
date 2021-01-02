<?php

namespace Modules\Client\Entities;

use App\BaseModel;

class YearlyLgaClientIdentification extends BaseModel
{
    public function clients()
    {
    	return $this->hasMany(Client::class);
    }

    public function lga()
    {
        return $this->belongsTo('Modules\Apparent\Entities\Lga');
    }
}
