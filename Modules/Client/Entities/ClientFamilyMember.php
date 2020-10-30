<?php

namespace Modules\Client\Entities;

use App\BaseModel;

class ClientFamilyMember extends BaseModel
{
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
