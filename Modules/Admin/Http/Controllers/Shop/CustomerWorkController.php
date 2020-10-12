<?php

namespace Modules\Admin\Http\Controllers\Shop;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Shop;
use Modules\Admin\Entities\ShopClient;

class CustomerWorkController extends Controller
{
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

        return view('admin::shop.customer.work',[
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
        return view('admin::shop.customer.newWork',['shopClient'=>$shopClient]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function register(Request $request, $shopId, $shopClientId)
    {
        $shopClient = ShopClient::find($shopClientId);
        $shopClient->shopClientWorks()->create(['description'=>$request->description]);
        return redirect()->route('admin.shop.customer.work.index',[$shopId,$shopClientId])->withSuccess('Work has been registerd successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
