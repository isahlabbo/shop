<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Admin\Entities\Shop;

class ShopController extends Controller
{
    public function index($name)
    {
    	$shop = Shop::where(['name'=>deslug($name)])->first();
    	if(is_null($shop)){
    		return back();
    	}
    	return view('shop.index',['shop'=>$shop]);
    }
}
