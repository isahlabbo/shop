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
use Modules\Apparent\Services\AddressHandle;
use Illuminate\Support\Facades\Validator;
use App\Services\Upload\FileUpload;
use Modules\Admin\Http\Requests\AdminRegistrationFormRequest as FormRequest;

class AdminRegistrationController extends Controller
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
        ]);
    }

    public function register(FormRequest $request)
    {
                
        $address = new AddressHandle($request->all());

        $this->create($request->all(), $address->address);

        return redirect()->route('admin.login')->withSuccess('Admin Registered successfully');

    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data, Address $address)
    {
        

        $admin = $address->admins()->create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'gender_id' => $data['gender'],
            'password' => Hash::make($data['password']),
        ]);
        
        if($data['image']){
            $admin->update(['image'=>$this->storeFile($data['image'], 'Images/Profiles/Admins/')]);
        }
    }

    
}
