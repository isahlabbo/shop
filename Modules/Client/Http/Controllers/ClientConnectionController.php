<?php

namespace Modules\Client\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Apparent\Entities\State;
use Modules\Client\Entities\Gender;
use Modules\Client\Http\Requests\ClientConnectionRegistrationFormRequest;
use Modules\Apparent\Services\AddressHandle;

class ClientConnectionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:client');
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('client::connection.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($referral)
    {
        return view('client::connection.create',[
            'states'=>State::all(),
            'genders'=>Gender::all(),
            'message'=>client()->CIN.' New Connection Registration page',
            'route'=>route('client.connection.register',[$referral]),
            'component'=>['address'=>true,'referral'=>true],
            'referral'=>$referral,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function register(ClientConnectionRegistrationFormRequest $request, $referralCode)
    {

       $data = $this->prepareData($request->all(),$referralCode);

        $address = new AddressHandle($data);

        $address->address->newClient($data);

        return redirect()->route('client.connection.index')->withSuccess('Connection Registered successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function prepareData($data,$code)
    {

        $data['email'] = $data['phone'].'@smc.com'; 
        $data['password'] = $data['phone']; 
        $data['referral_code'] = $code; 
        return $data; 
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('client::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
