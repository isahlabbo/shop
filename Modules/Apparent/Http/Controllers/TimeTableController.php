<?php

namespace Modules\Apparent\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\ProgrammeClass;

class TimeTableController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:apparent');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($classId)
    {
        return view('apparent::timeTable',['class'=>ProgrammeClass::find($classId)]);
    }

    
}
