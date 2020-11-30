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
}
