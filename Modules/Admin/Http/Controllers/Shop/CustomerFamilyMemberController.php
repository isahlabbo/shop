<?php

namespace Modules\Admin\Http\Controllers\Shop;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Shop;
use Modules\Client\Entities\Client;
use Modules\Client\Entities\Relation;
use Modules\Client\Entities\Gender;
use Modules\Apparent\Entities\State;
use Modules\Apparent\Entities\Address;
use Modules\Apparent\Entities\Religion;
use Modules\Apparent\Entities\Tribe;
use Modules\Apparent\Services\AddressHandle;
use Illuminate\Support\Facades\Hash;

class CustomerFamilyMemberController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($shopId,$clientId)
    {
        $shop = Shop::find($shopId);
        $client = Client::find($clientId);
        if(is_null($shop) || is_null($client)){
            return back()->withWarning('invalid URL');
        }
        return view('admin::shop.customer.familyMember.index',['shop'=>$shop,'client'=>$client]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($shopId,$clientId)
    {
        $shop = Shop::find($shopId);
        $client = Client::find($clientId);
        if(is_null($shop) || is_null($client)){
            return back()->withWarning('invalid URL');
        }
        return view('admin::shop.customer.familyMember.create',[
            'client'=>$client,
            'shop'=>$shop,
            'states'=>State::all(),
            'genders'=>Gender::all(),
            'relations'=>Relation::all(),
            'route'=>route('admin.shop.customer.family.member.register',[$shopId,$clientId]),
            'message'=>$client->first_name.' '.$client->last_name.' Family Member Registration',
            'status'=>1
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function register(Request $request, $shopId, $clientId)
    {

        $address = new AddressHandle($request->all());

        $client = $address->address->registerNewCustomer($request->all());

        $responsibleClient = Client::find($clientId);

        $client->shopClients()->create([
            'shop_id'=>$shopId,
            ]);

        $responsibleClient->clientFamilyMembers()->create([
            'family_member_id'=>$client->id,
            'relation_id'=>$request->relation
            ]);
       
        return redirect()->route('admin.shop.customer.family.member.index',[$shopId, $clientId])
        ->withSuccess('Customer family member Registered successfully');
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
