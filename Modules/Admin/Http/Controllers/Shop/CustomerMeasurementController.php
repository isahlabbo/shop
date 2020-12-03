<?php

namespace Modules\Admin\Http\Controllers\Shop;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Client\Entities\Client;
use Modules\Admin\Entities\Shop;

class CustomerMeasurementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($shopId, $clientId)
    {
        $client = Client::find($clientId);
        if(is_null($client)){
            return back()->withWarning('invalid customer ID');
        }
        $shop = Shop::find($shopId);
        if(is_null($shop)){
            return back()->withWarning('invalid shop ID');
        }
        return view('admin::shop.customer.measurement',[
            'client'=>$client,
            'shop'=>$shop,
            'route'=>route('admin.shop.customer.measurement.update',[$shopId,$clientId]),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $shopId, $clientId)
    {
        Client::find($clientId)->measurement()->update($request->all());

        return back()->withSuccess('Measurement updated');
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
