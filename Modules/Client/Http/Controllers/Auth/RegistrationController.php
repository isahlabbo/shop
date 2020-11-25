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
use Modules\Client\Http\Requests\ClientRegistrationFormRequest as FormRequest;

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
            'message'=>'Client Registration page',
            'route'=>route('client.register'),
            'status'=>null
        ]);
    }

    public function register(FormRequest $request)
    {
        
        //$this->validator($request->all())->validate();
        
        $address = new AddressHandle($request->all());

        $this->create($request->all(), $address->address);

        return redirect()->route('client.login')->withSuccess('Registered successfully');

    }

    public function __construct()
    {
        $this->middleware('guest:client');
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data, Address $address)
    {
        $client = $address->clients()->create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'gender_id' => $data['gender'],
            'password' => Hash::make($data['password']),
        ]);

        $client->update([
            'TID'=>$client->generateIdentificationNumber(),
            'yearly_address_client_identification_id'=>$client->getIdentification()->id,
        ]);

        if($client->gender->id == 1){
            $client->maleMeasure()->create([]);
        }else{
            $client->femaleMeasure()->create([]);
        }


    }

    

    
}
