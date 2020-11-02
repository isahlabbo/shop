<?php

namespace Modules\Client\Entities;

use App\BaseModel;

class Relation extends BaseModel
{
    public function clientFamilyMemebers()
    {
        return $this->hasMany(ClientFamilyMember::class);
    }
}
