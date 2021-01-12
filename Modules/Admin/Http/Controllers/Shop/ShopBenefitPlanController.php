<?php

namespace Modules\Admin\Http\Controllers\Shop;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Shop;

class ShopBenefitPlanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function benefitPlan($shopId)
    {
        return view('admin::shop.configuration.benefit.index',['shop'=>Shop::find($shopId)]);
    }

    
    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $shopId)
    {
        $request->validate([
            "shop_and_its_maintenance" => "required",
            "work_expensive" => "required",
            "work_agent" => "required",
            "work_beneficial" => "required"
        ]);
        $percentage = $this->validPercentages($request->all());

        if($percentage == 100){
            $shop= Shop::find($shopId);
            if($shop->shopWorkBenefitPlan){
                $shop->shopWorkBenefitPlan->update($request->all());
                $message = 'Plan updated successfully';
            }else{
                $shop->shopWorkBenefitPlan()->create($request->all());
                $message = 'Plan registered successfully';
            }
            return redirect()->route('admin.shop.configuration.benefit.plan',[$shopId])->withSuccess($message);
        }

        return redirect()->route('admin.shop.configuration.benefit.plan',[$shopId])->withWarning('The total of all percentage must be equal to 100 but '.$percentage.' is given');
    }

    public function validPercentages($data)
    {
        return $data['shop_and_its_maintenance'] + $data['work_expensive'] + $data['work_agent'] + $data['work_beneficial'];

        

    }

}
