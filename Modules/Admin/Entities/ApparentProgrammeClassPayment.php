<?php

namespace Modules\Admin\Entities;

use App\BaseModel;

class ApparentProgrammeClassPayment extends BaseModel
{
    public function apparentProgrammeClass()
    {
    	return $this->belongsTo(ApparentProgrammeClass::class);
    }
}
