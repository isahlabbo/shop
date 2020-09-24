<?php

namespace Modules\Admin\Entities;

use App\BaseModel;

class Programme extends BaseModel
{
    public function programmeSchedules()
    {
    	return $this->hasMany(ProgrammeSchedule::class);
    }

    public function hasMorningSchedule()
    {
        $flag = false;
        foreach ($this->programmeSchedules->where('schedule_id',1) as $key => $value) {
            $flag = true;
        }
        return $flag;
    }

    public function hasEveningSchedule()
    {
        $flag = false;
        foreach ($this->programmeSchedules->where('schedule_id',2) as $key => $value) {
            $flag = true;
        }
        return $flag;
    }
}
