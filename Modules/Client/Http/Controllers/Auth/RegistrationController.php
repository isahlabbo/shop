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
    
    public function __construct()
    {
        $this->middleware('guest:client');
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($referral = null)
    {
        return view('client::auth.registration',[
            'states'=>State::all(),
            'genders'=>Gender::all(),
            'message'=>'Client Registration page',
            'route'=>route('client.register'),
            'status'=>null,
            'referral'=>$referral
        ]);
    }

    public function register(FormRequest $request)
    {
                
        $address = new AddressHandle($request->all());

        $this->create($request->all(), $address->address);

        return redirect()->route('client.login')->withSuccess('Registered successfully');

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
            'referral_code' => $data['referral_code'],
            'password' => Hash::make($data['password']),
        ]);

        $client->update([
            'CIN' => $client->generateIdentificationNumber(),
            'yearly_lga_client_identification_id' => $address->area->town->lga->getIdentification()->id,
        ]);

        if($client->gender->id == 1){
            $client->maleMeasure()->create([]);
        }else{
            $client->femaleMeasure()->create([]);
        }


    }

    

    
}
