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

    public function apparentProgrammeClassPayments()
    {
    	return $this->hasMany(ApparentProgrammeClassPayment::class);
    }

    public function pendingPayment()
    {
    	$paid = 0;
    	foreach ($this->apparentProgrammeClassPayments as $payment) {
    		$paid = $paid + $payment->amount;
    	}

    	return $this->programmeClass->programme->fee - ($paid + getPercentageOf($this->discount, $this->programmeClass->programme->fee));
    }
}


