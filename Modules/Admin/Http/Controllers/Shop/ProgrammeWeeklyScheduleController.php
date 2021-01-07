<?php

namespace Modules\Admin\Http\Controllers\Shop;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Shop;
use Modules\Admin\Entities\Programme;
use Modules\Admin\Entities\ProgrammeWeeklySchedule;

class ProgrammeWeeklyScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($shopId, $programmeId)
    {
        return view('admin::shop.programme.schedule.index',[
            'programme'=>Programme::find($programmeId),
            'shop'=>Shop::find($shopId),
        ]);
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
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $shopId, $programmeId, $scheduleId)
    {
        $request->validate([
            'topic'=>'required|string',
            'objective'=>'required|string',
        ]);
        $schedule = ProgrammeWeeklySchedule::find($scheduleId);
        $schedule->update([
            'topic'=>$request->topic,
            'objective'=>$request->objective,
        ]);

        return redirect()->route('admin.shop.programme.schedule.index',[$shopId, $programmeId])->withSuccess($schedule->week.' schedule updated');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function delete($shopId, $programmeId, $scheduleId)
    {
        $schedule = ProgrammeWeeklySchedule::find($scheduleId);
        $schedule->delete();
        return redirect()->route('admin.shop.programme.schedule.index',[$shopId, $programmeId])
        ->withSuccess($schedule->week.' schedule deleted');

    }
}
