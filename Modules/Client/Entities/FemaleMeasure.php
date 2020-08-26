<?php

namespace Modules\Client\Entities;

use App\BaseModel;

class FemaleMeasure extends BaseModel
{
    public function client()
    {
    	return $this->belongsTo(Client::class);
    }
}
