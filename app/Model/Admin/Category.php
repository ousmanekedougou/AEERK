<?php

namespace App\Model\Admin;

use App\Model\Admin\Post;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function posts(){
        return $this->belongsToMany(Post::class,'categorie_posts');
    }

    public function getRouteKeyName(){
        return 'slug';
    }
}
