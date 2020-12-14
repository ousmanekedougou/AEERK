<?php

use App\Model\Admin\Info;
use App\Model\User\Option;
use App\Model\Admin\Category;
use App\Model\Admin\Tag;

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

if(! function_exists('all_category')){
    function all_category()
    {
        $category = Category::all();
        return $category;
    }
}


if(! function_exists('all_tag')){
    function all_tag()
    {
        $tag = Tag::all();
        return $tag;
    }
}