<?php

namespace Modules\Apparent\Entities;

use App\BaseModel;
use Modules\Apparent\Entities\Address;
use Illuminate\Support\Facades\Hash;
use App\Services\Upload\FileUpload;

class Address extends BaseModel
{
    
    use FileUpload;

    public function clients()
    {
    	return $this->hasMany('Modules\Client\Entities\Client');
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
    
    public function newAdmin(array $data)
    {
        $admin = $this->admins()->create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'gender_id' => $data['gender'],
            'password' => Hash::make($data['password']),
        ]);
        
        if(isset($data['image'])){
            $admin->update(['image'=>$this->storeFile($data['image'], 'Images/Profiles/Admins/')]);
        }

        if(isset($data['shop'])){
            $admin->update(['status'=>0]);
        }

        return $admin;
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
            'yearly_lga_client_identification_id' => $this->area->town->lga->getIdentification()->id,
        ]);

        if($client->gender->id == 1){
            $client->maleMeasure()->create([]);
        }else{
            $client->femaleMeasure()->create([]);
        }
        return $client;
    }

    
}
