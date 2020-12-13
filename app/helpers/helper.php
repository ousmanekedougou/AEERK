<?php

use App\Model\Admin\Info;
use App\Model\User\Option;

if(! function_exists('all_info')){
    function all_info()
    {
        $info = Info::first();
        return $info;
    }
}


if(! function_exists('all_option')){
    function all_option()
    {
        $option = Option::first();
        return $option;
    }
}