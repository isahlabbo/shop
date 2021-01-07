<?php

namespace Modules\Admin\Http\Controllers\Shop;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Shop;
use Modules\Admin\Entities\Programme;

class ProgrammeController extends Controller
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
        return view('admin::shop.programme.index',['shop'=>$shop]);
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
        return view('admin::shop.programme.create',['shop'=>$shop]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function register(Request $request, $shopId)
    {
        $shop = Shop::find($shopId);
        $programme = $shop->programmes()->create([
            'name'=>$request->name,
            'fee'=>$request->fee,
            'duration'=>$request->duration,
            'about'=>$request->about,
            ]);
        if($request->morning){
            $programme->programmeSchedules()->create(['schedule_id'=>1]);
        }
        
        if($request->evening){
            $programme->programmeSchedules()->create(['schedule_id'=>2]);
        }

        foreach ($programme->weeks() as $week) {
            $programme->programmeWeeklySchedules()->firstOrCreate([
                'week'=>'Week '.$week,
                'topic'=>"topic name",
                'objective'=>"aims and objective",
            ]);
        }
        
        return redirect()->route('admin.shop.programme.index',[$shopId])->withSuccess('Shop programme registered successfully');
    }

    
    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $shopId, $programmeId)
    {
        $programme = Programme::find($programmeId);

        if($programme->duration != $request->duration){
            foreach ($programme->programmeWeeklySchedules as $schedule) {
                $schedule->delete();
            }
        }

        $programme->update([
            'name'=>$request->name,
            'fee'=>$request->fee,
            'duration'=>$request->duration,
            'about'=>$request->about,
        ]);

        foreach ($programme->weeks() as $week) {
            $programme->programmeWeeklySchedules()->firstOrCreate([
                'week'=>'Week '.$week,
                'topic'=>"topic name",
                'objective'=>"aims and objective",
            ]);
        }

        return redirect()->route('admin.shop.programme.index',[$shopId])->withSuccess('Programme updated');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function delete($shopId, $programmeId)
    {
        $programme = Programme::find($programmeId);

        if(count($programme->apparents) > 0){
             return redirect()->route('admin.shop.programme.index',[$shopId])->withWarning('Programme cant be deleted because of the registered apparents in');
        }

        foreach ($programme->programmeWeeklySchedules as $schedule) {
            $schedule->delete();
        }
        $programme->delete();
        return redirect()->route('admin.shop.programme.index',[$shopId])->withSuccess('Programme deleted');

    }
}
