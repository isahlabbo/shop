<?php

namespace Modules\Admin\Entities;

use App\BaseModel;

class ProgrammeWeeklySchedule extends BaseModel
{
    public function programme()
    {
    	return $this->belongsTo(Programme::class);
    }
    
}
