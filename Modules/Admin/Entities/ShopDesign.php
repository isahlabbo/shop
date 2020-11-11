<?php

namespace Modules\Admin\Entities;

use App\BaseModel;

class ShopDesign extends BaseModel
{
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
