<?php

namespace Modules\Client\Http\Controllers\Shop;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Shop;

class ClientShopWorkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:client');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($shopId)
    {
        $shop = Shop::find($shopId);
        if(!$shop){
            return back()->withWarning('Invalid shopID');
        }
        return view('client::shop.work.create',['shop'=>$shop]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function register(Request $request, $shopId)
    {
       
        $shopClient = client()->shopClients()->firstOrCreate(['shop_id'=>$shopId]);
        
        $shopClientWork = $shopClient->shopClientWorks()->create([
            'description'=>$request->description,
            'fee'=>0,
            'paid_fee'=>0,
            'finishing_date'=>$request->finishing_date,
            'finishing_time'=>$request->finishing_time
            ]);
        
        return redirect()->route('client.dashboard')
        ->withSuccess('Work has been registered successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('client::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('client::edit');
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
