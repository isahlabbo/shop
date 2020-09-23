<?php

namespace Modules\Apparent\Entities;

use App\BaseModel;

class Tribe extends BaseModel
{
    public function apparents()
    {
        return $this->hasMany(Apparent::class);
    }
}
