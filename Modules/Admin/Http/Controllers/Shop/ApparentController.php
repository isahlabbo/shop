<?php

namespace Modules\Admin\Http\Controllers\Shop;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Shop;
use Modules\Admin\Entities\apparentProgrammeClass;
use Modules\Client\Entities\Gender;
use Modules\Apparent\Entities\State;
use Modules\Apparent\Entities\Religion;
use Modules\Apparent\Entities\Tribe;
use Modules\Apparent\Entities\Apparent;
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
    public function application($shopId)
    {
        $shop = Shop::find($shopId);
        if(is_null($shop)){
            return back();
        }
       return view('admin::shop.apparent.application',['shop'=>$shop]);
    }
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
            'component'=>['address'=>true],
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
        $data['shop_id'] = $shopId;

        $apparentAddress = new AddressHandle($data);
        //create apparent

        $apparent = $apparentAddress->address->newApparent($data);
        //modify the address to point the grantor address
        
        $grantorAddress = new AddressHandle($this->formalizeThisData($data));
        //register the grantor
        $grantorAddress->address->newGrantor($data, $apparent);

        //redirect to the apparent registered page for the shop
        return redirect()->route('admin.shop.apparent.index',[$shopId])
        ->withSuccess('Apparent registered successfully');
    }

    public function pay(Request $request, $shopId, $apparentProgrammeClassId)
    {
        $apparentProgrammeClass = apparentProgrammeClass::find($apparentProgrammeClassId);
        $apparentProgrammeClass->apparentProgrammeClassPayments()->create(['amount'=>$request->amount]);

        return redirect()->route('admin.shop.apparent.index', $shopId)->withSuccess('Payment registered successfully');
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
    public function edit($shopId, $apparentId)
    {
        return view('admin::shop.apparent.edit',[
            'component'=>['data'=>Apparent::find($apparentId)],
            'shop'=>Shop::find($shopId),
            'genders'=>Gender::all(),
            'states'=>State::all(),
            'religions'=>Religion::all(),
            'tribes'=>Tribe::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $shopId, $apparentId)
    {
        $data = $request->all();
        $data['shop_id'] = $shopId;

        $apparentAddress = new AddressHandle($data);
        //create apparent
       $data['address_id'] = $apparentAddress->address->id;

        $apparent = Apparent::find($apparentId);
        $apparent->updateInfor($data);

        
        
        $grantorAddress = new AddressHandle($this->formalizeThisData($data));
        //register the grantor
        $data['address_id'] = $grantorAddress->address->id;
        $apparent->grantor->updateInfor($data);

        //redirect to the apparent registered page for the shop
        return redirect()->route('admin.shop.apparent.index',[$shopId])
        ->withSuccess('Apparent information Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function delete($shopId, $apparentId)
    {
        $apparent = Apparent::find($apparentId);
        if($apparent->grantor){
            // delete the grator image from the server
            $apparent->grantor->deleteFile();

            // delete the grantor information
            $apparent->grantor->delete();
        }
        // delete the grator image from the server
        $apparent->deleteFile();

        $apparent->delete();

        return redirect()->route('admin.shop.apparent.index',[$shopId])
        ->withSuccess('Apparent deleted successfully');
    }

    public function formalizeThisData(array $data)
    {
        $data['state'] = $data['grantor_state'];
        $data['lga'] = $data['grantor_lga'];
        $data['town'] = $data['grantor_town'];
        $data['area'] = $data['grantor_area'];
        $data['address'] = $data['grantor_address'];
        return $data;
    }
}
