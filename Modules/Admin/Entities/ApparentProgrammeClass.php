<?php

namespace Modules\Admin\Entities;

use App\BaseModel;

class ApparentProgrammeClass extends BaseModel
{
    public function apparent()
    {
    	return $this->belongsTo('Modules\Apparent\Entities\Apparent');
    }

    public function programmeClass()
    {
    	return $this->belongsTo(ProgrammeClass::class);
    }
}
