<?php

namespace Modules\Apparent\Entities;

use App\BaseModel;

class Religion extends BaseModel
{
    public function apparents()
    {
        return $this->hasMany(Apparent::class);
    }
}
