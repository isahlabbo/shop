<?php

namespace Modules\Admin\Http\Controllers\Shop;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Shop;
use Modules\Admin\Entities\Programme;
use Modules\Admin\Entities\ProgrammeClass;

class ProgrammeClassController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($shopId,$programmeId)
    {
        return view('admin::shop.programme.class.index',['shop'=>Shop::find($shopId),'programme'=>Programme::find($programmeId)]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function register(Request $request,$shopId, $programmeId)
    {
        $request->validate([
            'name'=>'required|string',
            'start'=>'required',
            'end'=>'required',
        ]);

       $programme = Programme::find($programmeId);

       $class = $programme->newClass($request->all());

       return redirect()->route('admin.shop.programme.class.index',[$shopId, $programmeId])
       ->withSuccess($class->name.' Registered');
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
    public function update(Request $request, $shopId, $programmeId, $classId)
    {
        $request->validate([
            'name'=>'required|string',
            'start'=>'required',
            'end'=>'required',
        ]);

       $class = ProgrammeClass::find($classId);

       $class->update($request->all());

       return redirect()->route('admin.shop.programme.class.index',[$shopId, $programmeId])
       ->withSuccess($class->name.' Update');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function delete($shopId, $programmeId, $classId)
    {
        $class = ProgrammeClass::find($classId);
        if(count($class->apparents) == 0){
            $class->delete();
            return redirect()->route('admin.shop.programme.class.index',[$shopId, $programmeId])
            ->withSuccess($class->name.' Deleted');
        }else{
            return redirect()->route('admin.shop.programme.class.index',[$shopId, $programmeId])
           ->withSuccess($class->name.' Deleted');
        }
    }
}
