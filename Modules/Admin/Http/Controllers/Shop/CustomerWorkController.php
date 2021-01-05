<?php

namespace Modules\Admin\Http\Controllers\Shop;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Shop;
use Modules\Client\Entities\Client;
use Modules\Admin\Entities\ShopClient;
use Modules\Admin\Entities\ShopClientWork;
use App\Services\Upload\FileUpload;

class CustomerWorkController extends Controller
{
    use FileUpload;
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function workToday ($shopId)
    {
        $shop = Shop::find($shopId);
        if(is_null($shop)){
            return back()->withWarning('invalid shop ID');
        }
        return view('admin::shop.customer.work.today.index',[
            'shop'=>$shop
        ]);

    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($shopId,$shopClientId)
    {
        $shopClient = ShopClient::find($shopClientId);
        if(is_null($shopClient)){
            return back()->withWarning('invalid customer ID');
        }
        $shop = Shop::find($shopId);
        if(is_null($shop)){
            return back()->withWarning('invalid shop ID');
        }

        return view('admin::shop.customer.work.index',[
            'shop'=>$shop,
            'shopClient'=>$shopClient
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($shopId,$shopClientId)
    {
        $shopClient = ShopClient::find($shopClientId);
        if(is_null($shopClient)){
            return back()->withWarning('invalid customer ID');
        }
        
        return view('admin::shop.customer.work.create',['shopClient'=>$shopClient]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function register(Request $request, $shopId, $shopClientId)
    {
        $shopClient = ShopClient::find($shopClientId);
        $shop = Shop::find($shopId);
        
        $shopClientWork = $shopClient->shopClientWorks()->create([
            'description'=>$request->description,
            'fee'=>$request->fee,
            'paid_fee'=>$request->paid_fee,
            'finishing_date'=>$request->finishing_date,
            'finishing_time'=>$request->finishing_time
            ]);
        if($shopClient->client->referral_code){
            // get referrer
            $referrer = referrer($shopClient->client->referral_code);
            // make referrer a shop customer

            $referrerShopClient = $referrer->shopClients()->firstOrCreate(['shop_id'=>$shopId]);
            // if the work fee is more than or eqal to 1000 update shop client referral bonus
            if($request->fee >= $shop->shopReferralPlan->fee_limit){
                $referrerShopClient->shopClientReferralBonuses()->create(['shop_client_work_id'=>$shopClientWork->id,'amount'=>$shop->shopReferralPlan->referral_bonus]);
            }
        }
        if(isset($request->image)){
            $shopClientWork->update(['cloth_image'=>$this->storeFile($request->image, 'Images/Shop/'.$shop->id.'/Works/')]);
        }
        return redirect()->route('admin.shop.customer.work.index',[$shopId,$shopClientId])
        ->withSuccess('Work has been registered successfully');
    }

    public function update(Request $request, $shopId, $shopClientId, $shopClientWorkId)
    {

        $shopClientWork = ShopClientWork::find($shopClientWorkId);
        $shopClientWork->update([
            'description'=>$request->description,
            'fee'=>$request->fee,
            'paid_fee'=>$request->paid_fee,
            'finishing_date'=>$request->finishing_date,
            'finishing_time'=>$request->finishing_time
        ]);
        
        $shop = Shop::find($shopId);

        if($shopClientWork->shopClient->client->referral_code && referrer($shopClientWork->shopClient->client->referral_code)){
            // get referrer
            $referrer = referrer($shopClientWork->shopClient->client->referral_code);
            // make referrer a shop customer
            $referrerShopClient = $referrer->shopClients()->firstOrCreate(['shop_id'=>$shopId]);
            // if the work fee is more than or eqal to 1000 update shop client referral bonus
            if($request->fee >= $shop->shopReferralPlan->fee_limit){
                $referrerShopClient->shopClientReferralBonuses()->create(['shop_client_work_id'=>$shopClientWork->id,'amount'=>$shop->shopReferralPlan->referral_bonus]);
            }
        }
        return redirect()->route('admin.shop.customer.work.index',[$shopId,$shopClientWork->shopClient->id])
        ->withSuccess('Work has been registered successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function done($shopId, $shopClientWorkId)
    {
        $work = ShopClientWork::find($shopClientWorkId);
        $work->update(['status'=>1]);
        $work->shopClientWorkDone()->create([]);
        return redirect()->route('admin.shop.customer.work.index',[$shopId,$work->shopClient->id])
        ->withSuccess('Work done registered successfully');
    }

    public function collect($shopId, $shopClientWorkId)
    {
        $work = ShopClientWork::find($shopClientWorkId);
        $work->update(['status'=>2]);
        $work->shopClientWorkCollect()->create([]);
        return redirect()
        ->route('admin.shop.customer.work.index',[$shopId,$work->shopClient->id])
        ->withSuccess('Work collection registered successfully');
    }

    public function pay(Request $request, $shopId, $clientId, $shopClientWorkId)
    {
        $client = Client::find($clientId);

        $work = ShopClientWork::find($shopClientWorkId);

        $totalBonus = $client->availableBonusBalance();

        $totalBalance = $totalBonus;

        if($request->cash){
            $totalBalance = $totalBalance + $request->cash;
        }

        // pay the current work with the total if can
        $newBalance = $work->pay($totalBalance);

        if($newBalance == 0 && $totalBonus > 0){
            // clear all the bonus in the shop
            foreach ($client->shopClients->where('shop_id',$shopId) as $shopClient) {
                foreach ($shopClientReferralBonuses as $bonus) {
                    $bonus->update(['paid_amount'=>$bonus->amount]);
                }
            }
        }

        return back()->withSuccess('Payment registered successful with '.$newBalance.' remaining');
    }

}
