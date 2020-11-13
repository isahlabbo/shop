<?php

namespace Modules\Client\Http\Controllers\Shop;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Shop;

class ClientShopDesignController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:client');
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($shopId)
    {
        return view('client::shop.design.index',['shop'=>Shop::find($shopId)]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function like($shopId, $shopDesignId)
    {
        $requests = client()->shopDesignLikes->where('shop_design_id',$shopDesignId);
        if(count($requests)>0){
            foreach ($requests as $request) {
                $request->delete();
            }
        }else {
            client()->shopDesignLikes()->firstOrCreate(['shop_design_id'=>$shopDesignId]);
        }
        return back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function request($shopId, $shopDesignId)
    {
        $requests = client()->shopDesignRequests->where('shop_design_id',$shopDesignId);
        if(count($requests)>0){
            foreach ($requests as $request) {
                $request->delete();
            }
        }else {
            client()->shopDesignRequests()->firstOrCreate(['shop_design_id'=>$shopDesignId]);
        }
        
        return back();
    }

}
