<?php

namespace Modules\Admin\Entities;

use App\BaseModel;

class ProgrammeClass extends BaseModel
{
    public function programme()
    {
    	return $this->belongsTo(Programme::class);
    }

    public function apparents()
    {
    	return $this->hasMany('Modules\Apparent\Entities\Apparent');
    }

    public function apparentProgrammeClasses()
    {
    	return $this->hasMany(ApparentProgrammeClass::class);
    }

    public function currentWeek()
    {
    	$weekNo = floor($this->secondSpent() / $this->secondInWeek()) + 1;
    	return 'Week '.$weekNo;

    }

    public function secondInWeek()
    {
    	return ((60*60)*24)*7;
    }

    public function secondSpent()
    {
    	return time() - strtotime($this->start);
    }

    public function present()
    {

    	foreach ($this->programme->programmeWeeklySchedules->where('week', $this->currentWeek()) as $week) {
    		return $week;
    	}
    
    }


}
