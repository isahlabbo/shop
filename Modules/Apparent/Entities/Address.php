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

    public function newApparent(array $data)
    {
        $apparent = $this->apparents()->create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'gender_id' => $data['gender'],
            'religion_id' => $data['religion'],
            'tribe_id' => $data['tribe'],
            'programme_id' => $data['programme'],
            'shop_id' => $data['shop_id']
        ]);
        if(isset($data['apparent_image'])){
            $apparent->update(['image'=>$this->storeFile($data['apparent_image'], 'Images/Shop/'.$data['shop_id'].'/Apparents/')]);
        }

        $apparent->apparentProgrammeClasses()->firstOrCreate([
            'programme_class_id'=>$data['class'],
            'discount'=>$data['discount'],
        ]);
        
        return $apparent;
    }

    public function newGrantor(array $data, $apparent)
    {
        $grantor = $this->grantors()->create([
            'name'=>$data['grantor_name'],
            'email'=>$data['grantor_email'],
            'phone'=>$data['grantor_phone'],
        ]);
        
        if(isset($data['grantor_image'])){
            $grantor->update(['image'=>$this->storeFile($data['grantor_image'], 'Images/Shop/'.$data['shop_id'].'/Grantors/')]);
        }

        //connect the grantor and its apparent
        $apparent->update(['grantor_id'=>$grantor->id]);


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
