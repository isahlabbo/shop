<?php

namespace Modules\Admin\Http\Controllers\Shop;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Shop;
use Modules\Client\Entities\ShopClientReferralBonus;

class WorkPaymentController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function totalFee($shopId)
    {
        $shop = Shop::find($shopId);
        if(!$shop){
            return back()->withWarning('invalid shop ID');
        }
        return view('admin::shop.customer.work.payment.all',[
            'shop'=>$shop, 
            'works'=>$shop->allRegisteredWorks()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function paidFee($shopId)
    {
        $shop = Shop::find($shopId);
        if(!$shop){
            return back()->withWarning('invalid shop ID');
        }
        return view('admin::shop.customer.work.payment.paid',[
            'shop'=>$shop, 
            'works'=>$shop->paidWorks()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function pendingFee($shopId)
    {
        $shop = Shop::find($shopId);
        if(!$shop){
            return back()->withWarning('invalid shop ID');
        }
        return view('admin::shop.customer.work.payment.pending',[
            'shop'=>$shop, 
            'works'=>$shop->pendingPaymentWorks()
        ]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function paidBonus($shopId)
    {
        $shop = Shop::find($shopId);
        if(!$shop){
            return back()->withWarning('invalid shop ID');
        }
        return view('admin::shop.customer.work.payment.bonus.paid',[
            'shop'=>$shop, 
            'bonuses'=>$shop->availablePaidBonus()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function pendingBonus($shopId)
    {
        $shop = Shop::find($shopId);
        if(!$shop){
            return back()->withWarning('invalid shop ID');
        }
        return view('admin::shop.customer.work.payment.bonus.pending',[
            'shop'=>$shop, 
            'bonuses'=>$shop->availableUnPaidBonus()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function clearBonus(Request $request,$shopId, $bonusId)
    {
        $bonus = ShopClientReferralBonus::find($bonusId);
        if($request->amount > $bonus->amount){
            $message = "The valid amount is #".$bonus->amount.' or less';
        }else{
            $bonus->update(['paid_amount'=>$request->amount + $bonus->paid_amount]);
            if($bonus->amount == $bonus->paid_amount){
                $bonus->update(['status'=>1]);
            }
            $message = "#".$request->amount." Bonus cleared successfully";
        }

        return redirect()->route('admin.shop.payment.pendingBonus',[$shopId])->withWarning($message);
        
    }
}
