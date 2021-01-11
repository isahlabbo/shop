<?php

namespace Modules\Admin\Http\Controllers\Auth;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Modules\Apparent\Entities\State;
use Modules\Apparent\Entities\Address;
use Modules\Admin\Entities\DesignType;
use Modules\Client\Entities\Gender;
use Illuminate\Support\Facades\Validator;
use App\Services\Upload\FileUpload;
use Modules\Apparent\Services\AddressHandle;
use Modules\Admin\Http\Requests\AdminRegistrationFormRequest as FormRequest;

class ApparentRegistrationController extends Controller
{
    use FileUpload;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::auth.adminRegistration',[
            'states'=>State::all(),
            'designTypes'=>DesignType::all(),
            'genders'=>Gender::all(),
            'component'=>['address'=>true]
        ]);
    }

    public function register(FormRequest $request)
    {
                
        $address = new AddressHandle($request->all());

        $address->address->newAdmin($request->all());

        return redirect()->route('admin.login')->withSuccess('Admin Registered successfully');

    }

    

    
}
