<?php

namespace Modules\Client\Http\Controllers\Shop;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Apparent\Entities\State;
use Modules\Apparent\Entities\Address;
use Modules\Apparent\Entities\Town;
use Modules\Apparent\Entities\Lga;
use Modules\Apparent\Entities\Area;

class SearchShopController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('client::shop.search.index',['states'=>State::all()]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('client::shop.search.create',['states'=>State::all()]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function search(Request $request)
    {
        $shops = $this->availableShops($request->all());
        if(count($shops) == 0){
            return redirect()->route('client.shop.create')->withWarning('No record found for this search');
        }
    }

    public function availableShops($data)
    {
        $shops = [];
        if($data['address']){
            $shops = Address::find($data['address'])->shops;
        }elseif ($data['area']) {
            $shops = Area::find($data['area'])->shops('all');
        }elseif ($data['town']) {
            $shops = Town::find($data['town'])->shops('all');
        }elseif ($data['lga']) {
            $shops = Lga::find($data['lga'])->shops('all');
        }elseif ($data['state']) {
            $shops = State::find($data['state'])->shops('all');
        }

        return $shops;
    }
}
