<?php

namespace Modules\Admin\Http\Controllers\Shop;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Shop;
use Modules\Client\Entities\Gender;
use Modules\Apparent\Entities\State;
use Modules\Apparent\Entities\Religion;
use Modules\Apparent\Entities\Tribe;
use Modules\Apparent\Services\AddressHandle;
use Illuminate\Support\Facades\Hash;

class ApparentController extends Controller
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
            'states'=>State::all(),
            'religions'=>Religion::all(),
            'tribes'=>Tribe::all()
            ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function register(Request $request, $shopId)
    {
        $data = $request->all();
        $apparentAddress = new AddressHandle($data);
        //create apparent
        $apparent = $apparentAddress->address->apparents()->create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'gender_id' => $data['gender'],
            'religion_id' => $data['religion'],
            'tribe_id' => $data['tribe'],
            'shop_id' => $shopId

        ]);
        //modify the address to point the grantor address
        $data['state'] = $data['grantor_state'];
        $data['lga'] = $data['grantor_lga'];
        $data['town'] = $data['grantor_town'];
        $data['area'] = $data['grantor_area'];
        $data['address'] = $data['grantor_address'];
        $grantorAddress = new AddressHandle($data);
        //register the grantor
        $grantor = $grantorAddress->address->grantors()->create([
            'name'=>$data['grantor_name'],
            'email'=>$data['grantor_email'],
            'phone'=>$data['grantor_phone'],
        ]);

        //connect the grantor and its apparent
        $apparent->update(['grantor_id'=>$grantor->id]);

        //redirect to the apparent registered page for the shop
        return redirect()->route('admin.shop.apparent.index',[$shopId])
        ->withSuccess('Apparent registered successfully');
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
