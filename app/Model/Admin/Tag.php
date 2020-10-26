<?php

namespace App\Model\Admin;

use App\Model\Admin\Post;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts(){
        return $this->belongsToMany(Post::class,'post_tags');
    }
}
