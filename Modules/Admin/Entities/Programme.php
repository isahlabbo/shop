<?php

namespace Modules\Admin\Entities;

use App\BaseModel;

class Programme extends BaseModel
{
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
    
    public function programmeSchedules()
    {
    	return $this->hasMany(ProgrammeSchedule::class);
    }

    public function programmeClasses()
    {
        return $this->hasMany(ProgrammeClass::class);
    }

    public function newClass(array $data)
    {
        return $this->programmeClasses()->create($data);
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

    public function programmeWeeklySchedules()
    {
        return $this->hasMany(ProgrammeWeeklySchedule::class);
    }

    public function weeks()
    {
        $weeks = [];
        
        $count = $this->duration * 4;
       
        for ($i=1; $i <= $count ; $i++) { 
            $weeks[] = $i;
        }

        return $weeks;
    }

    public function apparents()
    {
        return $this->hasMany('Modules\Apparent\Entities\Apparent');
    }
}
