<?php

namespace Modules\Admin\Entities;

use App\BaseModel;

class Schedule extends BaseModel
{
    public function programmeSchedules()
    {
    	return $this->hasMany(ProgrammeSchedule::class);
    }
}
