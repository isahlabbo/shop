<?php

namespace Modules\Apparent\Entities;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Services\Upload\FileUpload;
use Illuminate\Support\Facades\Hash;


class Apparent extends Authenticatable
{
    use Notifiable, FileUpload;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'password',
        'email',
        'phone',
        'image',
        'gender_id',
        'religion_id',
        'tribe_id',
        'shop_id',
        'grantor_id',
        'programme_id',
        'programme_class_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function gender()
    {
        return $this->belongsTo('Modules\Client\Entities\Gender');
    }

    public function apparentProgrammeClasses()
    {
        return $this->hasMany('Modules\Admin\Entities\ApparentProgrammeClass');
    }

    public function shop()
    {
        return $this->belongsTo('Modules\Admin\Entities\Shop');
    }

    public function programme()
    {
        return $this->belongsTo('Modules\Admin\Entities\Programme');
    }

    public function religion()
    {
        return $this->belongsTo(Religion::class);
    }

    public function tribe()
    {
        return $this->belongsTo(Tribe::class);
    }

    public function grantor()
    {
        return $this->belongsTo(Grantor::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function updateInfor(array $data)
    {
        $this->update([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'gender_id' => $data['gender'],
            'religion_id' => $data['religion'],
            'tribe_id' => $data['tribe'],
            'programme_id' => $data['programme'],
            'shop_id' => $data['shop_id'],
            'address_id' => $data['address_id']
        ]);

        if($data['password']){
            $this->update([
                'password' => Hash::make($data['password'])
            ]);
        }

        if(isset($data['apparent_image'])){
           $this->updateFile($this, 'image', $data['apparent_image'], 'Images/Shop/'.$data['shop_id'].'/Apparents/');
        }
        
        return $this;
    }
}
