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

    public function shopClientWorkCollect()
    {
    	return $this->hasOne(ShopClientWorkCollect::class);
    }

    public function shopClientWorkBargains()
    {
    	return $this->hasMany(ShopClientWorkBargain::class);
    }

    public function shopClientWorkDone()
    {
    	return $this->hasOne(ShopClientWorkDone::class);
    }

    public function pendingFee()
    {
    	return $this->fee - $this->paid_fee;
    }

    public function pendingPayment()
    {
        return $this->fee - $this->paid_fee;
    }

    public function shareableBalance()
    {
        return getPercentageOf($this->shopClient->shop->shopWorkBenefitPlan->work_beneficial, $this->fee);
    }

    public function shopClientWorkAdminShares()
    {
        return $this->hasMany(ShopClientWorkAdminShare::class);
    }

    public function shopClientWorkShopShare()
    {
        return $this->hasOne(ShopClientWorkShopShare::class);
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
    	if($this->fee == 0){
    		$progress = 'The work is under review by the Admin pls wait for the feed back';
    	}else{
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
    	}
    	
    	return $progress;
    }
}
