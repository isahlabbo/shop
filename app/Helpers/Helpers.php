<?php

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

