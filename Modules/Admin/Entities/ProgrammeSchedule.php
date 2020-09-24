<?php

namespace Modules\Admin\Entities;

use App\BaseModel;

class ProgrammeSchedule extends BaseModel
{
    public function programme()
    {
    	return $this->belongsTo(Programme::class);
    }

    public function schedule()
    {
    	return $this->belongsTo(Schedule::class);
    }
}
