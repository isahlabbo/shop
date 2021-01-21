<?php

namespace Modules\Admin\Http\Controllers\Shop;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Admin;
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
        $shopClientWork->shopClientWorkShopShare()->create([
            'shop_and_its_maintenance' => getPercentageOf($shop->shopWorkBenefitPlan->shop_and_its_maintenance,$request->fee),
            'work_beneficial' => getPercentageOf($shop->shopWorkBenefitPlan->work_beneficial,$request->fee),
            'work_agent' => getPercentageOf($shop->shopWorkBenefitPlan->work_agent,$request->fee),
            'work_expensive' => getPercentageOf($shop->shopWorkBenefitPlan->work_expensive,$request->fee),
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
        $shop = Shop::find($shopId);
        $shopClientWork = ShopClientWork::find($shopClientWorkId);
        $shopClientWork->update([
            'description'=>$request->description,
            'fee'=>$request->fee,
            'paid_fee'=>$request->paid_fee,
            'finishing_date'=>$request->finishing_date,
            'finishing_time'=>$request->finishing_time
        ]);

        $share = $shopClientWork->shopClientWorkShopShare()->firstOrCreate([]);
        $share->update([
            'shop_and_its_maintenance' => getPercentageOf($shop->shopWorkBenefitPlan->shop_and_its_maintenance,$request->fee),
            'work_beneficial' => getPercentageOf($shop->shopWorkBenefitPlan->work_beneficial,$request->fee),
            'work_agent' => getPercentageOf($shop->shopWorkBenefitPlan->work_agent,$request->fee),
            'work_expensive' => getPercentageOf($shop->shopWorkBenefitPlan->work_expensive,$request->fee),
             ]);

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
    public function shareBenefit(Request $request, $shopId, $clientId, $shopClientWorkId)
    {
        $percentage = $this->validPercentage($request->all());
        $shopClientWork = ShopClientWork::find($shopClientWorkId);

        if($percentage == 100){
            foreach ($request->all() as $key => $value) {
                if(is_numeric($key)){
                   $admin = Admin::find($key);
                    $share = $admin->shopClientWorkAdminShares()->firstOrCreate([
                    'shop_client_work_id'=>$shopClientWorkId
                    ]);
                    $shareAmount = getPercentageOf($value[0], $shopClientWork->shareableBalance());
                    $share->update([
                    'amount'=>$shareAmount,
                    'percent'=>$value[0]
                    ]);

                    // check if admin has debit card, use it and pay the work
                    foreach ($admin->shopAdmins->where('shop_id',$shopId) as $shopAdmin) {
                        $cardBalance = $shopAdmin->debitCardBalance();
                        if($cardBalance > 0){
                            if($cardBalance >= $shareAmount){
                                $share->update(['paid'=>$shareAmount]);
                            }else{
                                $share->update(['paid'=>$cardBalance]);
                            }
                            $cardBalance = $cardBalance - $shareAmount;

                            // tell card you have used it
                            foreach ($shopAdmin->shopAdminCreditShares as $card) {
                                $card->update(['used'=>time()]);
                            }

                            // create another card record with remaining balance
                            if($cardBalance > 0){
                                $shopAdmin->shopAdminCreditShares()->create(['amount'=>$cardBalance]);
                            }
                        }
                    }
                }       
            }
            return redirect()->route('admin.shop.customer.work.index',[$shopId, $clientId])->withSuccess('The work partispation benefit is shared among admins of the shop');
        }
        return redirect()->route('admin.shop.customer.work.index',[$shopId, $clientId])->withWarning('Sorry you have share 100 percent among the partsipating admin but '.$percentage.' is given');
    }

    public function validPercentage($data)
    {
        $percentage = 0;
        foreach ($data as $key => $value) {
            if(is_numeric($key)){
                $percentage = $percentage + $value[0];
            }       
        }
        return $percentage;
    }
}
