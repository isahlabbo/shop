<?php

namespace Modules\Apparent\Entities;

use App\BaseModel;
use Modules\Apparent\Entities\Address;
use Illuminate\Support\Facades\Hash;

class Address extends BaseModel
{
    

    public function clients()
    {
    	return $this->hasMany('Modules\Client\Entities\Client');
    }

    public function yearlyAddressClientIdentifications()
    {
        return $this->hasMany('Modules\Client\Entities\YearlyAddressClientIdentification');
    }

    public function apparents()
    {
    	return $this->hasMany('Modules\Apparent\Entities\Apparent');
    }

    public function admins()
    {
    	return $this->hasMany('Modules\Admin\Entities\Admin');
    }

    public function shops()
    {
    	return $this->hasMany('Modules\Admin\Entities\Shop');
    }

    public function grantors()
    {
        return $this->hasMany(Grantor::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function newClient(array $data)
    {
        $client = $this->clients()->create([
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
            'yearly_address_client_identification_id' => $this->getIdentification()->id,
        ]);

        if($client->gender->id == 1){
            $client->maleMeasure()->create([]);
        }else{
            $client->femaleMeasure()->create([]);
        }
        return $client;
    }

    public function getIdentification()
    {   
        $identification = null;

        foreach ($this->yearlyAddressClientIdentifications->where('year',date('Y')) as $clientIdentification) {
            $identification = $clientIdentification;
        }
        
        return $identification;
        
    }
}
