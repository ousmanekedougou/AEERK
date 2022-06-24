<?php

use App\Model\Admin\Info;
use App\Model\User\Option;
use App\Model\Admin\Category;
use App\Model\Admin\Immeuble;
use App\Model\Admin\Partenaire;
use App\Model\Admin\Post;
use App\Model\Admin\Tag;
use App\Model\User\Domaine;
use App\Model\User\Temoignage;
use App\Model\User\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


if(!function_exists('all_info')){
    function all_info()
    {
        $info = Info::first();
        return $info;
    }
}

if(!function_exists('lien_front')){
    function lien_front()
    {
        $user_lien_front = User::first();
        return $user_lien_front;
    }
}

if(!function_exists('all_option')){
    function all_option()
    {
        $option = Option::first();
        return $option;
    }
}

if(!function_exists('all_category')){
    function all_category()
    {
        $category = Category::all();
        return $category;
    }
}

if(!function_exists('all_article_populaire')){
    function all_article_populaire()
    {
        $article_pop = Post::where('status',1)->where('view','>',100)->limit(5)->get();
        return $article_pop;
    }
}


if(!function_exists('all_tag')){
    function all_tag()
    {
        $tag = Tag::all();
        return $tag;
    }
}


if(!function_exists('page_title')){
    function page_title($title)
    {
        $page_title = 'AEERK';
        if($title === ''){
            return  $page_title;
        }else{
            return $title . ' | ' . $page_title;
        }
    }
}

if(!function_exists('set_active_roote')){
    function set_active_roote($route)
    {
        return Route::is($route) ? 'active' : '';
    }
}

if(!function_exists('all_temoignage')){
    function all_temoignage()
    {
        $temoignage = Temoignage::all();
        return $temoignage;
    }
}


if(!function_exists('all_article')){
    function all_article()
    {
        $article = Post::limit(4)->get();
        return $article;
    }
}


if(!function_exists('all_immeuble')){
    function all_immeuble()
    {
        $immeubles = Immeuble::all();
        return $immeubles;
    }
}

if(!function_exists('envoiemail')){
    function envoiemail()
    {
        $email = 'aeerk.sn@gmail.com';
        return $email;
    }
}

if(!function_exists('admin')){
    function admin()
    {
        $admin = Auth::guard('admin')->user();
        return $admin;
    }
}

if(!function_exists('domaine')){
     function domaine()
    {
        $domaine = Domaine::all();
        return $domaine;
    }
}