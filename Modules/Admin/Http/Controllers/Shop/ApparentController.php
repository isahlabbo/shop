<?php

namespace Modules\Admin\Http\Controllers\Shop;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Shop;
use Modules\Client\Entities\Gender;
use Modules\Apparent\Entities\State;

class ApparentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($shopId)
    {
        $shop = Shop::find($shopId);
        if(is_null($shop)){
            return back();
        }
        return view('admin::shop.apparent.index',['shop'=>$shop]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($shopId)
    {
        $shop = Shop::find($shopId);
        if(is_null($shop)){
            return back();
        }
        return view('admin::shop.apparent.create',[
            'shop'=>$shop,
            'genders'=>Gender::all(),
            'states'=>State::all()
            ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function register(Request $request, $shopId)
    {
        dd($request->all());
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
