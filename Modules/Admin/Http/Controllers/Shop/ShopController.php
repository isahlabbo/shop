<?php

namespace Modules\Admin\Http\Controllers\Shop;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Apparent\Entities\State;
use Modules\Admin\Entities\DesignType;
use Modules\Apparent\Services\AddressHandle;
use App\Services\Upload\FileUpload;

class ShopController extends Controller
{
    use FileUpload;

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
            'component'=> ['address'=>true],
            'designTypes'=>DesignType::all()
        ]);
    }

    public function registration(Request $request)
    {
        $address = new AddressHandle($request->all());
        $shop = $address->address->shops()->create([
            'name'=>strtoupper($request->name),
            'design_type_id'=>$request->design,
            'work_capacity'=>$request->work_capacity,
            'admin_id'=> admin()->id,
            'words'=>$request->words,
            'about'=>$request->about
        ]);
        
        if($request->image){
            $shop->update(['image'=>$this->storeFile($request->image,'Images/Shop/'.$shop->name.'/')]);
        }

        admin()->shopAdmins()->firstOrCreate(['shop_id'=>$shop->id]);

        $shop->shopReferralPlan()->firstOrCreate([
            'fee_limit'=>$request->fee_limit,
            'referral_bonus'=>$request->referral_bonus
        ]);

        return redirect()->route('shop.index',[slug($request->name)])->withSuccess('Shop registration was successfull');
    }

}
