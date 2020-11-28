<?php

namespace App\Model\Admin;

use App\Model\Admin\Tag;
use App\Model\User\Comment;
use App\Model\Admin\Category;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function categories(){
        return $this->belongsToMany(Category::class,'categorie_posts');
    }
    public function tags(){
        return $this->belongsToMany(Tag::class,'post_tags');
    }
    public function getRouteKeyName(){
        return 'slug';
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
