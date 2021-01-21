<?php

namespace Modules\Admin\Http\Controllers\Shop;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Client\Entities\Gender;
use Modules\Apparent\Entities\State;
use Modules\Admin\Entities\ShopAdmin;
use Modules\Apparent\Services\AddressHandle;
use Modules\Admin\Http\Requests\AdminRegistrationFormRequest as FormRequest;

class ShopAdminController extends Controller
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
        return view('admin::shop.admin.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {

        return view('admin::shop.admin.create',[
        'message' => 'Shop Admin registration page',
        'route' => route('admin.shop.admin.register'),
        'component' => ['address'=>true,'shop'=>true,'login'=>true],
        'status' => null,
        'referral' => null,
        'genders' => Gender::all(),
        'states' => State::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function register(Request $request)
    {
        $address = new AddressHandle($request->all());

        $admin = $address->address->newAdmin($request->all());

        $admin->shopAdmins()->create(['shop_id'=>$request->shop]);

        return redirect()->route('admin.shop.admin.index')->withSuccess('Admin Registered successfully');
        
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function pay(Request $request, $shopAdminId)
    {
        $request->validate(['paid'=>'required']);
        
        $shopAdmin = ShopAdmin::find($shopAdminId);

        $message = $shopAdmin->payOrCreditTheAdminCard($request->all());

        return redirect()->route('admin.shop.admin.index')->withSuccess($message);
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
