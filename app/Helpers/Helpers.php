<?php
use Modules\Client\Entities\Client;

if (!function_exists('client')) {
    function client()
    {
        $client = null;
        if(auth()->guard('client')->check()){
            $client = auth()->guard('client')->user();
        }
        return $client;
    }
}

if (!function_exists('storage_url')) {
    function storage_url($url)
    {
        return blank($url) ? $url: Storage::url($url);
    }
}

if (!function_exists('referrer')) {
    function referrer($code)
    {
        foreach (Client::where('CIN',$code)->get() as $client) {
            return $client;
        }
    }
}

if (!function_exists('admin')) {
    function admin()
    {
        $admin = null;
        if(auth()->guard('admin')->check()){
            $admin = auth()->guard('admin')->user();
        }
        return $admin;
    }
}

if (!function_exists('user')) {
    function user()
    {       
        if(admin()){
            $user = admin();
        }elseif (client()) {
        	$user = client();
        }elseif (apparent()) {
            $user = apparent();
        }
        return $user;
    }
}

if (!function_exists('slug')) {
    function slug($name)
    {       
        return strtolower(str_replace(' ', '-', $name));
    }
}

if (!function_exists('deslug')) {
    function deslug($name)
    {       
        return strtoupper(str_replace('-', ' ', $name));
    }
}

if (!function_exists('routes')) {
    function routes()
    {       
        if (admin()) {
            return ['home'=>'admin.dashboard','logout'=>'admin.logout'];
        }elseif (client()) {
            return ['home'=>'client.dashboard','logout'=>'client.logout'];
        }
    }
}

