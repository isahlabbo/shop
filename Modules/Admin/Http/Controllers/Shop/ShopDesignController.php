<?php

namespace Modules\Admin\Http\Controllers\Shop;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Admin\Entities\Shop;
use Illuminate\Routing\Controller;
use App\Services\Upload\FileUpload;
use Modules\Admin\Entities\ShopClientWork;

class ShopDesignController extends Controller
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
    public function index($shopId)
    {
        return view('admin::shop.design.index',['shop'=>Shop::find($shopId)]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($shopId, $shopClientWorkId)
    {
        return view('admin::shop.design.create',[
            'shop'=>Shop::find($shopId),
            'work'=>ShopClientWork::find($shopClientWorkId)
            ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function register(Request $request,$shopId,$shopClientWorkId)
    {
        $design = admin()->shopDesigns()->create([
            'shop_id'=>$shopId,
            'description'=>$request->description,
            'fee'=>$request->fee,
            'shop_client_work_id'=>$shopClientWorkId,
            'design_image'=>$this->storeFile($request->design_image, 'Images/Upload/'.Shop::find($shopId)->name.'/Designs'),
            'prove_image'=>$this->storeFile($request->prove_image, 'Images/Upload/'.Shop::find($shopId)->name.'/Proves')
            ]);

        return redirect()->route('admin.shop.design.index',[$shopId]);        
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
