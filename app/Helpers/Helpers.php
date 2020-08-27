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