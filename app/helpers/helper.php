<?php

use App\Model\Admin\Info;
use App\Model\User\Option;
use App\Model\Admin\Category;
use App\Model\Admin\Immeuble;
use App\Model\Admin\Partenaire;
use App\Model\Admin\Post;
use App\Model\Admin\Tag;
use App\Model\User\Temoignage;
  use Illuminate\Support\Facades\Route;
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


if(! function_exists('page_title')){
    function page_title($title)
    {
        $base_title = 'AEERK';
        if($title === ''){
            return  $base_title;
        }else{
            return $title . ' | ' . $base_title;
        }
    }
}

if(! function_exists('set_active_roote')){
    function set_active_roote($route)
    {
        return Route::is($route) ? 'active' : '';
    }
}

if(! function_exists('all_temoignage')){
    function all_temoignage()
    {
        $temoignage = Temoignage::where('status',1)->get();
        return $temoignage;
    }
}

if(! function_exists('all_part')){
    function all_part()
    {
        $part = Partenaire::all();
        return $part;
    }
}

if(! function_exists('all_article')){
    function all_article()
    {
        $article = Post::limit(4)->get();
        return $article;
    }
}


if(! function_exists('all_immeuble')){
    function all_immeuble()
    {
        $immeubles = Immeuble::all();
        return $immeubles;
    }
}