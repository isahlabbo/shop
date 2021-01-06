<?php

namespace Modules\Apparent\Entities;

use App\BaseModel;
use App\Services\Upload\FileUpload;
use Illuminate\Support\Facades\Hash;

class Grantor extends BaseModel
{
    use FileUpload;

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function gender()
    {
        return $this->belongsTo('Modules\Client\Entities\Gender');
    }

    public function apparents()
    {
        return $this->hasMany(Apparent::class);
    }

    public function updateInfor(array $data)
    {
        $this->update([
            'name'=>$data['grantor_name'],
            'email'=>$data['grantor_email'],
            'phone'=>$data['grantor_phone'],
        ]);
        
        if(isset($data['grantor_image']) && $data['grantor_image']){
            $grantor->update(['image'=>$this->updateFile($this, 'image', $data['grantor_image'], 'Images/Shop/'.$data['shop_id'].'/Grantors/')]);
        }
    }


}
