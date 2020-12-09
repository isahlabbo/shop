<?php

namespace Modules\Admin\Entities;

use App\BaseModel;

class ShopClientWork extends BaseModel
{
    public function shopClient()
    {
        return $this->belongsTo(ShopClient::class);
    }

    public function shopClientReferralBonus()
    {
        return $this->hasOne('Modules\Client\Entities\ShopClientReferralBonus');
    }

    public function pendingFee()
    {
    	return $this->fee - $this->paid_fee;
    }

    public function pendingPayment()
    {
        return $this->fee - $this->paid_fee;
    }

    public function pay($total)
    {

    	$newTotal = $total - $this->pendingPayment();
    	
    	if($newTotal >= 0){
    		$this->update(['paid_fee'=>$this->fee]);
    	}else{
            
            $this->update(['paid_fee'=>$total + $this->paid_fee]);
    	}
    	return $newTotal;
    }

    public function remeningDaysToComplete()
    {
    	return round((time() - strtotime($this->finishing_date)) / 86400);
    }

    public function progress()
    {
    	$progress = null;
    	switch ($this->status) {
    		case '0':
    			$progress = 'Processing';
    			break;

    		case '1':
    			$progress = 'Done';
    			break;
    		case '2':
    			$progress = 'Collected';
    			break;		
    		
    		default:
    			$progress = 'Undefine Status';
    			break;
    	}
    	return $progress;
    }
}
