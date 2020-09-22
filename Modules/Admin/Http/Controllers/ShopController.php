<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Apparent\Entities\State;
use Modules\Admin\Entities\DesignType;
use Modules\Apparent\Services\AddressHandle;

class ShopController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::shop.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::shop.create',[
            'states'=>State::all(),
            'designTypes'=>DesignType::all()
        ]);
    }

    public function registration(Request $request)
    {
        $address = new AddressHandle($request->all());
        $address->address->shops()->create([
            'name'=>strtoupper($request->name),
            'design_type_id'=>$request->design,
            'work_capacity'=>$request->work_capacity,
            'admin_id'=> admin()->id,
            'words'=>$request->words,
            'about'=>$request->about
        ]);

        return redirect()->route('shop.index',[slug($request->name)])->withSuccess('Shop registration was successfull');
    }

}
