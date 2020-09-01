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

