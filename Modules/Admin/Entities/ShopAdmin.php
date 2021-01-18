<?php

namespace Modules\Admin\Entities;

use App\BaseModel;

class ShopAdmin extends BaseModel
{
    public function shop()
    {
    	return $this->belongsTo(Shop::class);
    }

    public function admin()
    {
    	return $this->belongsTo(Admin::class);
    }

    public function shopAdminCreditShares()
    {
    	return $this->hasMany(ShopAdminCreditShare::class);
    }

    public function payOrCreditTheAdminCard(array $data)
    {
    	$payableBalance = $data['paid'];
        if($this->balanceParstispationCommission() > 0){

            foreach($this->admin->shopClientWorkAdminShares as $shopClientWorkAdminShare){
                $remainingBalance = $shopClientWorkAdminShare->amount - $shopClientWorkAdminShare->paid;
                
                if($remainingBalance <= $payableBalance){
                    $payableBalance = $payableBalance - $shopClientWorkAdminShare->amount;
                    $shopClientWorkAdminShare->update(['paid'=>$shopClientWorkAdminShare->amount]);
                }else{
                    $updateAbleBalance = $shopClientWorkAdminShare->paid + $payableBalance;
                    $shopClientWorkAdminShare->update(['paid'=> $updateAbleBalance]);
                    $payableBalance = 0;
                } 
            }
        }
        if($payableBalance > 0){
            // store the remaining money in the admin credit share
            $this->shopAdminCreditShares()->create(['amount'=>$payableBalance]);
            $message = 'Admin work partispation paid and #'.$payableBalance.' stored in his debit card for his next work partispation';
        }else{
            $message = 'Admin work partispation paid';
        }
        return $message;
    }

    public function debitCardBalance()
    {
    	$amount = 0;
    	foreach ($this->shopAdminCreditShares->where('used',0) as $card) {
    		$amount = $amount + $card->amount; 
    	}
    	return $amount;
    }

    public function totalParstispationCommission()
    {
    	$amount = 0;
    	foreach ($this->admin->shopClientWorkAdminShares as $share) {
    		$amount = $amount + $share->amount;
    	}
    	return $amount;
    }

    public function paidParstispationCommission()
    {
    	$amount = 0;
    	foreach ($this->admin->shopClientWorkAdminShares as $share) {
    		$amount = $amount + $share->paid;
    	}
    	return $amount;
    }

    public function balanceParstispationCommission()
    {
    	$amount = 0;
    	foreach ($this->admin->shopClientWorkAdminShares as $share) {
    		$amount = $amount + $share->amount-$share->paid;
    	}
    	return $amount;
    }
}
