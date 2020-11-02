<?php

namespace Modules\Admin\Http\Controllers\Shop;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Shop;
use Modules\Client\Entities\Gender;
use Modules\Apparent\Entities\State;
use Modules\Apparent\Entities\Address;
use Modules\Apparent\Entities\Religion;
use Modules\Apparent\Entities\Tribe;
use Modules\Apparent\Services\AddressHandle;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
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
        return view('admin::shop.customer.index',['shop'=>$shop]);
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
        return view('admin::shop.customer.create',[
            'shop'=>$shop,
            'states'=>State::all(),
            'genders'=>Gender::all(),
            'message'=>$shop->name.' Customer Registration',
            'route'=>route('admin.shop.customer.register',[$shop->id]),
            'status'=>null
            ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function register(Request $request,$shopId )
    {
        $address = new AddressHandle($request->all());

        $client = $this->registerNewCustomer($request->all(), $address->address);

        $client->shopClients()->create([
            'shop_id'=>$shopId,
            'refferal_code'=>$request->refferal_code,
            ]);

        return redirect()->route('admin.shop.customer.index',[$shopId])->withSuccess('Customer Registered successfully');
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

    protected function registerNewCustomer(array $data, Address $address)
    {
        $client = $address->clients()->create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'gender_id' => $data['gender'],
            'password' => Hash::make($data['password']),
        ]);

        if($client->gender->id == 1){
            $client->maleMeasure()->create([]);
        }else{
            $client->femaleMeasure()->create([]);
        }
        return $client;
    }
}
