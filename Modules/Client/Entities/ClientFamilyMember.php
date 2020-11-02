<?php

namespace Modules\Client\Entities;

use App\BaseModel;

class ClientFamilyMember extends BaseModel
{
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function relation()
    {
        return $this->belongsTo(Relation::class);
    }

    public function subClient()
    {
        return Client::find($this->family_member_id);
    }
}
