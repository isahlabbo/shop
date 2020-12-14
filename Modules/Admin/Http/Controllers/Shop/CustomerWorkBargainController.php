<?php

namespace Modules\Admin\Http\Controllers\Shop;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Shop;
use Modules\Admin\Entities\ShopClientWork;

class CustomerWorkBargainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($shopId)
    { 
        $shop = Shop::find($shopId);
        if(!$shop){
            return back()->withToast('Invalid shop ID');
        }
        return view('admin::shop.customer.work.bargain.index',['shop'=>$shop]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function comment($shopId,$workId)
    {
        $shop = Shop::find($shopId);
        if(!$shop){
            return back()->withToast('Invalid shop ID');
        }

        $work = ShopClientWork::find($workId);
        if(!$work){
            return back()->withToast('Invalid work ID');
        }
        return view('admin::shop.customer.work.bargain.comment',['shop'=>$shop,'work'=>$work]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function sendComment(Request $request, $shopId, $shopClientWorkId)
    {
        $work = ShopClientWork::find($shopClientWorkId);
        $work->shopClientWorkBargains()->firstOrCreate([
            'comment'=>$request->comment,
            'admin_id'=>admin()->id
        ]);
        return redirect()->route('admin.shop.customer.work.bargain.comments',[$shopId, $shopClientWorkId])->withSuccess('work bargain comment registered successfully');
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
