<?php

namespace Modules\Client\Http\Controllers\Auth;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Modules\Apparent\Entities\State;
use Modules\Apparent\Entities\Address;
use Modules\Client\Entities\Gender;
use Modules\Apparent\Services\AddressHandle;
use Illuminate\Support\Facades\Validator;


class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('client::auth.registration',[
            'states'=>State::all(),
            'genders'=>Gender::all(),
        ]);
    }

    public function register(Request $request)
    {
        
        //$this->validator($request->all())->validate();
        
        $address = new AddressHandle($request->all());

        $this->create($request->all(), $address->address);

        return back();

    }

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'town' => ['required', 'string', 'max:255'],
            'area' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clients'],
            'phone' => ['required', 'string', 'max:11', 'unique:clients'],
            'gender' => ['required'],
            'lga' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data, Address $address)
    {
        return $address->clients()->create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'gender_id' => $data['gender'],
            'password' => Hash::make($data['password']),
        ]);
    }

    
}