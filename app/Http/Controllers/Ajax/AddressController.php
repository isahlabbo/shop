<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Apparent\Entities\Lga;
use Modules\Apparent\Entities\Town;
use Modules\Apparent\Entities\Area;
use Modules\Apparent\Entities\Address;
use Modules\Admin\Entities\ProgrammeClass;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function getLgas($state_id)
    {
        return response()->json(Lga::where('state_id',$state_id)->pluck('name','id'));
    }

    public function getTowns($lga_id)
    {
        return response()->json(Town::where('lga_id',$lga_id)->pluck('name','id'));
    }

    public function getAreas($town_id)
    {
        return response()->json(Area::where('town_id',$town_id)->pluck('name','id'));
    }

    public function getAddresses($area_id)
    {
        return response()->json(Address::where('area_id',$area_id)->pluck('name','id'));
    }

    public function getProgrammeClass($programmeId)
    {
        return response()->json(ProgrammeClass::where('programme_id',$programmeId)->pluck('name','id'));
    }

    
}
