<?php

namespace Modules\Client\Http\Controllers\Shop;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Apparent\Entities\Area;
use Modules\Apparent\Entities\Address;
use Modules\Apparent\Entities\Lga;
use Modules\Apparent\Entities\Town;
use Modules\Apparent\Entities\State;

class AddressAvailableShopController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:client');
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function address($addressId)
    {
        $shops = Address::find($addressId)->shops;
        if(empty($shops)){
            return back()->withWarning('No shops record found');
        }
        return view('client::shop.search.index',['shops'=>$shops]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function area($areaId)
    {
        $shops = Area::find($areaId)->shops('all');
        if(empty($shops)){
            return back()->withWarning('No shops record found');
        }
        return view('client::shop.search.index',['shops'=>$shops]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function town($townId)
    {
        $shops = Town::find($townId)->shops('all');
        if(empty($shops)){
            return back()->withWarning('No shops record found');
        }
        return view('client::shop.search.index',['shops'=>$shops]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function lga($lgaId)
    {
        $shops = Lga::find($lgaId)->shops('all');
        if(empty($shops)){
            return back()->withWarning('No shops record found');
        }
        return view('client::shop.search.index',['shops'=>$shops]);
    }

    /**
     * Show the available shops in the state.
     * @param int $id
     * @return Renderable
     */
    public function state($stateId)
    {
        $shops = State::find($stateId)->shops('all');
        if(empty($shops)){
            return back()->withWarning('No shops record found');
        }
        return view('client::shop.search.index',['shops'=>$shops]);
    }

}
