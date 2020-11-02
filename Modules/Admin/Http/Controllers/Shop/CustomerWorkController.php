<?php

namespace Modules\Admin\Http\Controllers\Shop;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Shop;
use Modules\Admin\Entities\ShopClient;
use Modules\Admin\Entities\ShopClientWork;

class CustomerWorkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
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
        $shopClient->shopClientWorks()->create([
            'description'=>$request->description,
            'fee'=>$request->fee,
            'paid_fee'=>$request->paid_fee,
            'finishing_date'=>$request->finishing_date,
            'finishing_time'=>$request->finishing_time
            ]);
        return redirect()->route('admin.shop.customer.work.index',[$shopId,$shopClientId])
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
        return redirect()
        ->route('admin.shop.customer.work.index',[$shopId,$work->shopClient->id])
        ->withSuccess('Work done registered successfully');
    }

}
