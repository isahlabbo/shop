<?php

namespace Modules\Apparent\Entities;

use App\BaseModel;

class Grantor extends BaseModel
{
    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function gender()
    {
        return $this->belongsTo('Modules\Client\Entities\Gender');
    }

    public function apparents()
    {
        return $this->hasMany(Apparent::class);
    }
}
