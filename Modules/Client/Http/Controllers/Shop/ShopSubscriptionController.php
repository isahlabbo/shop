<?php

namespace Modules\Client\Http\Controllers\Shop;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ShopSubscriptionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:client');
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function subscribe($shopId)
    {
        if(client()->hasSubscription($shopId)){
            $subscription = client()->clientShopSubscriptions->where('shop_id',$shopId)[0];

            // if the subscription is active de-activate it
            if(client()->hasActiveSubscription($shopId)){
                $subscription->update(['status'=>0]);
                $message = 'Subscription canceled successfully';
            }else{
                $subscription->update(['status'=>1]);
                $message = 'Subscription updated successfully';
            }
        }else {
            client()->clientShopSubscriptions()->create(['shop_id'=>$shopId]);
            $message = 'Subscribed Successfully';
        }
        return redirect()->route('client.shop.view',[$shopId])->withSuccess($message);
    }



}
