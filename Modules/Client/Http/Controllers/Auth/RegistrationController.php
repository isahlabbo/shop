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

        $client->update(['TID'=>$this->generateNumber($client)]);

        if($client->gender->id == 1){
            $client->maleMeasure()->create([]);
        }else{
            $client->femaleMeasure()->create([]);
        }
    }

    public function generateNumber($client)
    {
        return substr(date('Y'), 2, 2).$client->gender->id.$this->formatNumber($client->id);
    }

    public function formatNumber($number)
    {
        $ext = '';
        if($number < 10){
            $ext = '0000000';
        }elseif ($number < 100) {
            $ext = '000000';
        }elseif ($number <1000) {
            $ext = '00000';
        }elseif ($number <10000) {
            $ext = '0000';
        }elseif ($number <100000) {
            $ext = '000';
        }elseif ($number <1000000) {
            $ext = '00';
        }elseif ($number <10000000) {
            $ext = '0';
        }
        return $ext.$number;
    }

    
}
